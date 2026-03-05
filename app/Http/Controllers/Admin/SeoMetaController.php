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
            'title_ar' => 'nullable|string',
            'title_en' => 'nullable|string',
            'title_fr' => 'nullable|string',
            'title_es' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'description_en' => 'nullable|string',
            'description_fr' => 'nullable|string',
            'description_es' => 'nullable|string',
            'keywords_ar' => 'nullable|string',
            'keywords_en' => 'nullable|string',
            'keywords_fr' => 'nullable|string',
            'keywords_es' => 'nullable|string',
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
        $seo = SeoMeta::find($id);
        if (!$seo) {
            return redirect()->route('admin.seo.index')->with('error', 'SEO record not found');
        }
        $allSeoPages = SeoMeta::orderBy('page')->get();
        return view('admin.seo.edit', compact('seo', 'allSeoPages'));
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
            'title_ar' => 'nullable|string',
            'title_en' => 'nullable|string',
            'title_fr' => 'nullable|string',
            'title_es' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'description_en' => 'nullable|string',
            'description_fr' => 'nullable|string',
            'description_es' => 'nullable|string',
            'keywords_ar' => 'nullable|string',
            'keywords_en' => 'nullable|string',
            'keywords_fr' => 'nullable|string',
            'keywords_es' => 'nullable|string',
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
