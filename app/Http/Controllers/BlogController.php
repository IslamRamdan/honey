<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    // عرض كل المدونات
    public function index()
    {
        $blogs = Blog::all();
        return view('blogs.index', compact('blogs'));
    }

    // صفحة إنشاء مدونة جديدة
    public function create()
    {
        return view('blogs.create');
    }

    // تخزين المدونة الجديدة
    public function store(Request $request)
    {
        $request->validate([
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'name_fr' => 'required|string|max:255',
            'name_es' => 'required|string|max:255',

            'description_ar' => 'required|string',
            'description_en' => 'required|string',
            'description_fr' => 'required|string',
            'description_es' => 'required|string',

            // الصورة الرئيسية
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp',

            // صور إضافية (max 4)
            'images'   => 'nullable|array|max:4',
            'images.*' => 'image|mimes:jpg,jpeg,png,webp',

            // روابط فيديو (max 2)
            'videos'   => 'nullable|array|max:2',
            'videos.*' => 'nullable|url',

            'status' => 'required|in:new,blog',
        ]);

        $data = $request->except(['images', 'videos']);

        /* =======================
       الصورة الرئيسية
    ======================= */
        if ($request->hasFile('image')) {
            $imageName = time() . '_main.' . $request->image->extension();
            $request->image->move(public_path('images/blogs'), $imageName);
            $data['image'] = $imageName;
        }

        /* =======================
       الصور الإضافية (Array)
    ======================= */
        $images = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $name = time() . '_' . uniqid() . '.' . $file->extension();
                $file->move(public_path('images/blogs'), $name);
                $images[] = $name;
            }
        }
        $data['images'] = $images ?: null;

        /* =======================
       روابط الفيديو
    ======================= */
        $videos = array_filter($request->videos ?? []);
        $data['videos'] = $videos ?: null;

        Blog::create($data);

        return redirect()
            ->route('blogs.index')
            ->with('success', 'تم إنشاء المدونة بنجاح');
    }

    // صفحة تعديل المدونة
    public function edit(Blog $blog)
    {
        return view('blogs.edit', compact('blog'));
    }

    // تحديث المدونة
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'name_fr' => 'required|string|max:255',
            'name_es' => 'required|string|max:255',

            'description_ar' => 'required|string',
            'description_en' => 'required|string',
            'description_fr' => 'required|string',
            'description_es' => 'required|string',

            // الصورة الرئيسية
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp',

            // صور إضافية (حد أقصى 4 إجمالي)
            'images'   => 'nullable|array',
            'images.*' => 'image|mimes:jpg,jpeg,png,webp',

            // فيديوهات (حد أقصى 2)
            'videos'   => 'nullable|array|max:2',
            'videos.*' => 'nullable|url',

            'status' => 'required|in:new,blog',
        ]);

        $data = $request->except(['images', 'videos']);

        /* =======================
       الصورة الرئيسية
    ======================= */
        if ($request->hasFile('image')) {
            $imageName = time() . '_main.' . $request->image->extension();
            $request->image->move(public_path('images/blogs'), $imageName);
            $data['image'] = $imageName;
        }

        /* =======================
       الصور الإضافية
    ======================= */
        $oldImages = $blog->images ?? [];
        $newImages = [];

        if ($request->hasFile('images')) {
            $remaining = 4 - count($oldImages);

            if ($remaining <= 0) {
                return back()->withErrors('لا يمكن إضافة أكثر من 4 صور');
            }

            foreach (array_slice($request->file('images'), 0, $remaining) as $file) {
                $name = time() . '_' . uniqid() . '.' . $file->extension();
                $file->move(public_path('images/blogs'), $name);
                $newImages[] = $name;
            }
        }

        $data['images'] = array_merge($oldImages, $newImages) ?: null;

        /* =======================
       روابط الفيديو
    ======================= */
        $videos = array_filter($request->videos ?? []);
        $data['videos'] = $videos ?: null;

        $blog->update($data);

        return redirect()
            ->route('blogs.index')
            ->with('success', 'تم تعديل المدونة بنجاح');
    }

    // حذف المدونة
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('blogs.index')->with('success', 'تم حذف المدونة');
    }
    public function deleteImage(Blog $blog, $index)
    {
        $images = $blog->images ?? [];

        if (isset($images[$index])) {
            $file = public_path('images/blogs/' . $images[$index]);
            if (file_exists($file)) unlink($file);
            array_splice($images, $index, 1);
            $blog->update(['images' => $images]);
        }

        return response()->json(['success' => true]);
    }
}
