<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /* =======================
       عرض كل المدونات
    ======================== */
    public function index()
    {
        $blogs = Blog::all();
        return view('blogs.index', compact('blogs'));
    }

    /* =======================
       صفحة إنشاء مدونة
    ======================== */
    public function create()
    {
        return view('blogs.create');
    }

    /* =======================
       تخزين مدونة جديدة
    ======================== */
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

            // صور إضافية (حد أقصى 4)
            'images'   => 'nullable|array',
            'images.*' => 'image|mimes:jpg,jpeg,png,webp',

            // فيديوهات (حد أقصى 2)
            'videos'   => 'nullable|array|max:2',
            'videos.*' => 'file|mimes:mp4,webm,ogg,mov|max:51200',

            'status' => 'required|in:new,blog',
        ]);

        $data = $request->except(['images', 'videos']);

        /* =======================
           الصورة الرئيسية
        ======================== */
        if ($request->hasFile('image')) {
            $imageName = time() . '_main.' . $request->image->extension();
            $request->image->move(public_path('images/blogs'), $imageName);
            $data['image'] = $imageName;
        }

        /* =======================
           الصور الإضافية
        ======================== */
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
           الفيديوهات
        ======================== */
        $videos = [];
        if ($request->hasFile('videos')) {
            foreach ($request->file('videos') as $file) {
                $name = time() . '_' . uniqid() . '.' . $file->extension();
                $file->move(public_path('videos/blogs'), $name);
                $videos[] = $name;
            }
        }
        $data['videos'] = $videos ?: null;

        Blog::create($data);

        return redirect()
            ->route('blogs.index')
            ->with('success', 'تم إنشاء المدونة بنجاح');
    }

    /* =======================
       صفحة تعديل المدونة
    ======================== */
    public function edit(Blog $blog)
    {
        return view('blogs.edit', compact('blog'));
    }

    /* =======================
       تحديث المدونة
    ======================== */
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

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp',

            'images'   => 'nullable|array',
            'images.*' => 'image|mimes:jpg,jpeg,png,webp',

            'videos'   => 'nullable|array|max:2',
            'videos.*' => 'file|mimes:mp4,webm,ogg,mov|max:51200',

            'status' => 'required|in:new,blog',
        ]);

        $data = $request->except(['images', 'videos']);

        /* =======================
           الصورة الرئيسية
        ======================== */
        if ($request->hasFile('image')) {
            $imageName = time() . '_main.' . $request->image->extension();
            $request->image->move(public_path('images/blogs'), $imageName);
            $data['image'] = $imageName;
        }

        /* =======================
           الصور الإضافية
        ======================== */
        $oldImages = $blog->images ?? [];
        $newImages = [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $name = time() . '_' . uniqid() . '.' . $file->extension();
                $file->move(public_path('images/blogs'), $name);
                $newImages[] = $name;
            }
        }

        $data['images'] = array_merge($oldImages, $newImages) ?: null;

        /* =======================
           الفيديوهات
        ======================== */
        $oldVideos = $blog->videos ?? [];
        $newVideos = [];

        if ($request->hasFile('videos')) {
            $remaining = 2 - count($oldVideos);

            if ($remaining <= 0) {
                return back()->withErrors('لا يمكن إضافة أكثر من فيديوهين');
            }

            foreach (array_slice($request->file('videos'), 0, $remaining) as $file) {
                $name = time() . '_' . uniqid() . '.' . $file->extension();
                $file->move(public_path('videos/blogs'), $name);
                $newVideos[] = $name;
            }
        }

        $data['videos'] = array_merge($oldVideos, $newVideos) ?: null;

        $blog->update($data);

        return redirect()
            ->route('blogs.index')
            ->with('success', 'تم تعديل المدونة بنجاح');
    }

    /* =======================
       حذف مدونة
    ======================== */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('blogs.index')->with('success', 'تم حذف المدونة');
    }

    /* =======================
       حذف صورة واحدة
    ======================== */
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

    /* =======================
       حذف فيديو واحد
    ======================== */
    public function deleteVideo(Blog $blog, $index)
    {
        $videos = $blog->videos ?? [];

        if (isset($videos[$index])) {
            $file = public_path('videos/blogs/' . $videos[$index]);
            if (file_exists($file)) unlink($file);
            array_splice($videos, $index, 1);
            $blog->update(['videos' => $videos]);
        }

        return response()->json(['success' => true]);
    }
}
