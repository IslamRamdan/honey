<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::ordered()->get();
        return view('admin.faqs.index', compact('faqs'));
    }

    public function create()
    {
        return view('admin.faqs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'question_en' => 'required|string',
            'question_ar' => 'required|string',
            'question_fr' => 'nullable|string',
            'question_es' => 'nullable|string',
            'answer_en' => 'required|string',
            'answer_ar' => 'required|string',
            'answer_fr' => 'nullable|string',
            'answer_es' => 'nullable|string',
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        Faq::create($data);

        return redirect()->route('admin.faqs.index')->with('success', 'تمت الإضافة بنجاح');
    }

    public function edit(Faq $faq)
    {
        return view('admin.faqs.edit', compact('faq'));
    }

    public function update(Request $request, Faq $faq)
    {
        $request->validate([
            'question_en' => 'required|string',
            'question_ar' => 'required|string',
            'question_fr' => 'nullable|string',
            'question_es' => 'nullable|string',
            'answer_en' => 'required|string',
            'answer_ar' => 'required|string',
            'answer_fr' => 'nullable|string',
            'answer_es' => 'nullable|string',
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        $faq->update($data);

        return redirect()->route('admin.faqs.index')->with('success', 'تم التعديل بنجاح');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();
        return back()->with('success', 'تم الحذف بنجاح');
    }
}
