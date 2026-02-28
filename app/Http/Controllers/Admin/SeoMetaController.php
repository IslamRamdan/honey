<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SeoMeta;
use Illuminate\Http\Request;

class SeoMetaController extends Controller
{
    public function index()
    {
        $seoMetas = SeoMeta::latest()->get();
        return view('admin.seo.index', compact('seoMetas'));
    }

    public function create()
    {
        return view('admin.seo.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'page' => 'required|string',
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'keywords' => 'nullable|string',
            'image' => 'nullable|image'
        ]);

        // تحقق هل الصفحة موجودة بالفعل
        $existingSeo = SeoMeta::where('page', $request->page)->first();
        if ($existingSeo) {
            return redirect()->back()->with('error', 'لقد تم إنشاء SEO لهذه الصفحة من قبل.');
        }

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('seo', 'public');
        }

        SeoMeta::create($data);

        return redirect()->route('admin.seo.index')->with('success', 'تم إضافة SEO للصفحة بنجاح');
    }


    public function edit($id)
    {
        $seo = SeoMeta::find($id); // او findOrFail لو تحب يرمي 404
        if (!$seo) {
            return redirect()->route('admin.seo.index')->with('error', 'SEO record not found');
        }
        return view('admin.seo.edit', compact('seo'));
    }


    public function update(Request $request, $id)
    {
        $seo = SeoMeta::findOrFail($id);

        // تحقق هل الصفحة الجديدة موجودة مسبقًا لسجل آخر
        $existingSeo = SeoMeta::where('page', $request->page)
            ->where('id', '!=', $seo->id)
            ->first();
        if ($existingSeo) {
            return redirect()->back()->with('error', 'لقد تم إنشاء SEO لهذه الصفحة من قبل.');
        }

        $request->validate([
            'page' => 'required|string',
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'keywords' => 'nullable|string',
            'image' => 'nullable|image'
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('seo', 'public');
        }

        $seo->update($data);

        return redirect()->route('admin.seo.index')->with('success', 'تم التعديل بنجاح');
    }


    public function destroy($id)
    {
        SeoMeta::findOrFail($id)->delete();
        return back()->with('success', 'تم الحذف');
    }
}
