<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::ordered()->get();
        return view('admin.pages.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.pages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'slug' => 'required|string|unique:pages,slug|max:255',
            'title_en' => 'nullable|string|max:255',
            'title_ar' => 'nullable|string|max:255',
            'title_fr' => 'nullable|string|max:255',
            'title_es' => 'nullable|string|max:255',
            'content_en' => 'nullable|string',
            'content_ar' => 'nullable|string',
            'content_fr' => 'nullable|string',
            'content_es' => 'nullable|string',
            'image' => 'nullable|image|max:10240',
            'images' => 'nullable|array',
            'images.*' => 'image|max:10240',
            'icon' => 'nullable|string|max:255',
        ]);

        $data = $request->except(['image', 'images']);
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('pages', 'public');
        }

        // Handle multiple images
        $imagesList = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $imagesList[] = $file->store('pages', 'public');
            }
        }
        $data['images'] = $imagesList ?: null;

        Page::create($data);

        return redirect()->route('admin.pages.index')->with('success', __('messages.created_successfully'));
    }

    public function edit(Page $page)
    {
        return view('admin.pages.edit', compact('page'));
    }

    public function update(Request $request, Page $page)
    {
        $request->validate([
            'slug' => 'required|string|max:255|unique:pages,slug,' . $page->id,
            'title_en' => 'nullable|string|max:255',
            'title_ar' => 'nullable|string|max:255',
            'title_fr' => 'nullable|string|max:255',
            'title_es' => 'nullable|string|max:255',
            'content_en' => 'nullable|string',
            'content_ar' => 'nullable|string',
            'content_fr' => 'nullable|string',
            'content_es' => 'nullable|string',
            'image' => 'nullable|image|max:10240',
            'images' => 'nullable|array',
            'images.*' => 'image|max:10240',
            'icon' => 'nullable|string|max:255',
        ]);

        $data = $request->except(['image', 'images']);
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('pages', 'public');
        }

        // Handle multiple images
        $oldImages = $page->images ?? [];
        $newImages = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $newImages[] = $file->store('pages', 'public');
            }
        }
        // Merge old and new images
        $data['images'] = array_merge($oldImages, $newImages) ?: null;

        $page->update($data);

        return redirect()->route('admin.pages.index')->with('success', __('messages.updated_successfully'));
    }

    public function destroy(Page $page)
    {
        $page->delete();
        return back()->with('success', __('messages.deleted_successfully'));
    }

    /**
     * Delete a single additional image
     */
    public function deleteImage(Page $page, $index)
    {
        $images = $page->images ?? [];

        if (isset($images[$index])) {
            $file = storage_path('app/public/' . $images[$index]);
            if (file_exists($file)) unlink($file);
            array_splice($images, $index, 1);
            $page->update(['images' => $images ?: null]);
        }

        return response()->json(['success' => true]);
    }
}
