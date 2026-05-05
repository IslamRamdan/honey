<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Traits\CompressesImages;

class BlogController extends Controller
{
    use CompressesImages;
    /* =======================
       عرض كل المدونات
    ======================== */
    public function index(Request $request)
    {
        // $blogs = Blog::all();
        $query = Blog::query();

        // فلترة حسب النوع (blog / news)
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $blogs = $query->latest()->paginate(10);

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
            'name_ar' => 'nullable|string|max:255|required_with:description_ar',
            'name_en' => 'nullable|string|max:255|required_with:description_en',
            'name_fr' => 'nullable|string|max:255|required_with:description_fr',
            'name_es' => 'nullable|string|max:255|required_with:description_es',

            'description_ar' => 'nullable|string|required_with:name_ar',
            'description_en' => 'nullable|string|required_with:name_en',
            'description_fr' => 'nullable|string|required_with:name_fr',
            'description_es' => 'nullable|string|required_with:name_es',

            // الصورة الرئيسية
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp',

            // صور إضافية (حد أقصى 4)
            'images'   => 'nullable|array',
            'images.*' => 'image|mimes:jpg,jpeg,png,webp',

            // فيديوهات
            'videos'   => 'nullable|array',
            'videos.*' => 'file|mimes:mp4,webm,ogg,mov',

            'status' => 'required|in:new,blog',
        ]);

        $this->validateAtLeastOneLanguage($request);

        $data = $this->fillMissingLanguageContent($request->except(['images', 'videos']));

        /* =======================
           الصورة الرئيسية
        ======================== */
        if ($request->hasFile('image')) {
            $data['image'] = $this->storeCompressedImageToPublic($request->image, 'images/blogs');
        }

        /* =======================
           الصور الإضافية
        ======================== */
        $images = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $images[] = $this->storeCompressedImageToPublic($file, 'images/blogs');
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
            'name_ar' => 'nullable|string|max:255|required_with:description_ar',
            'name_en' => 'nullable|string|max:255|required_with:description_en',
            'name_fr' => 'nullable|string|max:255|required_with:description_fr',
            'name_es' => 'nullable|string|max:255|required_with:description_es',

            'description_ar' => 'nullable|string|required_with:name_ar',
            'description_en' => 'nullable|string|required_with:name_en',
            'description_fr' => 'nullable|string|required_with:name_fr',
            'description_es' => 'nullable|string|required_with:name_es',

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp',

            'images'   => 'nullable|array',
            'images.*' => 'image|mimes:jpg,jpeg,png,webp',

            'videos'   => 'nullable|array',
            'videos.*' => 'file|mimes:mp4,webm,ogg,mov',

            'status' => 'required|in:new,blog',
        ]);

        $this->validateAtLeastOneLanguage($request);

        $data = $this->fillMissingLanguageContent($request->except(['images', 'videos']));

        /* =======================
           الصورة الرئيسية
        ======================== */
        if ($request->hasFile('image')) {
            $data['image'] = $this->storeCompressedImageToPublic($request->image, 'images/blogs');
        }

        /* =======================
           الصور الإضافية
        ======================== */
        $oldImages = $blog->images ?? [];
        $newImages = [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $newImages[] = $this->storeCompressedImageToPublic($file, 'images/blogs');
            }
        }

        $data['images'] = array_merge($oldImages, $newImages) ?: null;

        /* =======================
           الفيديوهات
        ======================== */
        $oldVideos = $blog->videos ?? [];
        $newVideos = [];

        if ($request->hasFile('videos')) {
            foreach ($request->file('videos') as $file) {
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

    private function validateAtLeastOneLanguage(Request $request): void
    {
        $hasCompleteLanguage = collect(['ar', 'en', 'fr', 'es'])->contains(function ($locale) use ($request) {
            return filled($request->input("name_{$locale}"))
                && filled($request->input("description_{$locale}"));
        });

        if (! $hasCompleteLanguage) {
            validator([], [])->after(function ($validator) {
                $validator->errors()->add(
                    'content_language',
                    __('messages.blog_language_requirement')
                );
            })->validate();
        }
    }

    private function fillMissingLanguageContent(array $data): array
    {
        $locales = ['ar', 'en', 'fr', 'es'];
        $fallbackLocale = collect($locales)->first(function ($locale) use ($data) {
            return filled($data["name_{$locale}"] ?? null)
                && filled($data["description_{$locale}"] ?? null);
        });

        if (! $fallbackLocale) {
            return $data;
        }

        foreach ($locales as $locale) {
            $data["name_{$locale}"] = $data["name_{$locale}"] ?? $data["name_{$fallbackLocale}"];
            $data["description_{$locale}"] = $data["description_{$locale}"] ?? $data["description_{$fallbackLocale}"];
        }

        return $data;
    }
}
