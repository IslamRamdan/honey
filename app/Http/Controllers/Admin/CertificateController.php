<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function index()
    {
        $certificates = Certificate::ordered()->get();
        return view('admin.certificates.index', compact('certificates'));
    }

    public function create()
    {
        return view('admin.certificates.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'icon_image' => 'required|image|max:2048',
            'full_images.*' => 'nullable|image|max:5120',
            'sort_order' => 'nullable|integer',
        ]);

        $data = [];
        $data['icon_image'] = $request->file('icon_image')->store('certificates', 'public');
        $data['is_active'] = $request->has('is_active');
        $data['sort_order'] = $request->sort_order ?? 0;

        $fullImages = [];
        if ($request->hasFile('full_images')) {
            foreach ($request->file('full_images') as $file) {
                $fullImages[] = $file->store('certificates', 'public');
            }
        }
        $data['full_images'] = $fullImages;

        Certificate::create($data);

        return redirect()->route('admin.certificates.index')->with('success', 'تمت الإضافة بنجاح');
    }

    public function edit(Certificate $certificate)
    {
        return view('admin.certificates.edit', compact('certificate'));
    }

    public function update(Request $request, Certificate $certificate)
    {
        $request->validate([
            'icon_image' => 'nullable|image|max:2048',
            'full_images.*' => 'nullable|image|max:5120',
            'sort_order' => 'nullable|integer',
        ]);

        $data = [];
        $data['is_active'] = $request->has('is_active');
        $data['sort_order'] = $request->sort_order ?? 0;

        if ($request->hasFile('icon_image')) {
            $data['icon_image'] = $request->file('icon_image')->store('certificates', 'public');
        }

        $fullImages = $certificate->full_images ?? [];
        if ($request->hasFile('full_images')) {
            foreach ($request->file('full_images') as $file) {
                $fullImages[] = $file->store('certificates', 'public');
            }
        }
        $data['full_images'] = $fullImages;

        $certificate->update($data);

        return redirect()->route('admin.certificates.index')->with('success', 'تم التعديل بنجاح');
    }

    public function destroy(Certificate $certificate)
    {
        $certificate->delete();
        return back()->with('success', 'تم الحذف بنجاح');
    }

    public function deleteImage(Certificate $certificate, $index)
    {
        $images = $certificate->full_images ?? [];
        if (isset($images[$index])) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($images[$index]);
            unset($images[$index]);
            $certificate->update(['full_images' => array_values($images)]);
        }
        return back()->with('success', 'تم حذف الصورة بنجاح');
    }
}
