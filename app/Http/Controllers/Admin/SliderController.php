<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::ordered()->get();
        return view('admin.sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.sliders.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:5120',
            'alt_en' => 'nullable|string|max:255',
            'alt_ar' => 'nullable|string|max:255',
            'alt_fr' => 'nullable|string|max:255',
            'alt_es' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
        ]);

        $data = $request->except('image');
        $data['image'] = $request->file('image')->store('sliders', 'public');
        $data['is_active'] = $request->has('is_active');

        Slider::create($data);

        return redirect()->route('admin.sliders.index')->with('success', 'تمت الإضافة بنجاح');
    }

    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit', compact('slider'));
    }

    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'image' => 'nullable|image|max:5120',
            'alt_en' => 'nullable|string|max:255',
            'alt_ar' => 'nullable|string|max:255',
            'alt_fr' => 'nullable|string|max:255',
            'alt_es' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
        ]);

        $data = $request->except('image');
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('sliders', 'public');
        }

        $slider->update($data);

        return redirect()->route('admin.sliders.index')->with('success', 'تم التعديل بنجاح');
    }

    public function destroy(Slider $slider)
    {
        $slider->delete();
        return back()->with('success', 'تم الحذف بنجاح');
    }
}
