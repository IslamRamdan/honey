<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Traits\CompressesImages;

class CategoryController extends Controller
{
    use CompressesImages;

    public function index()
    {
        $categories = Category::withoutGlobalScope('ordered')->orderBy('sort_order')->get();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'name_fr' => 'required|string|max:255',
            'name_es' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $this->storeCompressedImageToPublic($request->image, 'images/categories');
        }

        // تعيين قيمة افتراضية لترتيب الظهور
        $data['sort_order'] = $data['sort_order'] ?? Category::withoutGlobalScopes()->count();

        Category::create($data);

        return redirect()->route('categories.index')->with('success', 'تم إنشاء التصنيف بنجاح');
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'name_fr' => 'required|string|max:255',
            'name_es' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $this->storeCompressedImageToPublic($request->image, 'images/categories');
        }

        $category->update($data);

        return redirect()->route('categories.index')->with('success', 'تم تعديل التصنيف بنجاح');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'تم حذف التصنيف');
    }

    /**
     * إعادة ترتيب الأقسام عبر AJAX (Drag & Drop)
     */
    public function reorder(Request $request)
    {
        $request->validate([
            'order' => 'required|array',
            'order.*' => 'integer|exists:categories,id',
        ]);

        foreach ($request->order as $position => $id) {
            Category::withoutGlobalScopes()->where('id', $id)->update(['sort_order' => $position]);
        }

        return response()->json(['success' => true, 'message' => 'تم حفظ الترتيب بنجاح']);
    }

    public function showProducts(Category $category)
    {
        $products = $category->products()->paginate(9);

        $seo = new \stdClass();
        $seo->title_ar = $category->name_ar . ' | بي آند هني';
        $seo->title_en = $category->name_en . ' | Bee & Honey';
        $seo->title_es = $category->name_es . ' | Bee & Honey';
        $seo->title_fr = $category->name_fr . ' | Bee & Honey';

        $seo->description_ar = 'تصفح منتجاتنا في قسم ' . $category->name_ar . ' من بي آند هني للحصول على أفضل المنتجات الطبيعية.';
        $seo->description_en = 'Browse our products in the ' . $category->name_en . ' category from Bee & Honey for the best natural products.';
        $seo->description_es = 'Explore nuestros productos en la categoría ' . $category->name_es . ' de Bee & Honey para obtener los mejores productos naturales.';
        $seo->description_fr = 'Parcourez nos produits dans la catégorie ' . $category->name_fr . ' de Bee & Honey pour les meilleurs produits naturels.';

        $seo->keywords_ar = $category->name_ar . ', عسل, منتجات طبيعية, بي آند هني, منتجات';
        $seo->keywords_en = $category->name_en . ', honey, natural products, bee and honey, products';
        $seo->keywords_es = $category->name_es . ', miel, productos naturales, bee and honey, productos';
        $seo->keywords_fr = $category->name_fr . ', miel, produits naturels, bee and honey, produits';

        $seo->image = $category->image ? '../images/categories/' . $category->image : null;

        return view('products', compact('category', 'products', 'seo'));
    }

    public function products($id)
    {
        $category = Category::findOrFail($id);
        $products = $category->products()->paginate(10);
        return view('categories.products', compact('category', 'products'));
    }
}
