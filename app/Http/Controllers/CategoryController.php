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
        $categories = Category::all();
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
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $this->storeCompressedImageToPublic($request->image, 'images/categories');
        }

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
    public function showProducts(Category $category)
    {
        // جلب المنتجات المرتبطة بالتصنيف
        $products = $category->products()->paginate(9); // 9 منتجات لكل صفحة

        return view('products', compact('category', 'products'));
    }
    public function products($id)
    {
        $category = Category::findOrFail($id);
        $products = $category->products()->paginate(10); // أو get() حسب الحاجة
        return view('categories.products', compact('category', 'products'));
    }
}
