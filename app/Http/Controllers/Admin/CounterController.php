<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Counter;
use Illuminate\Http\Request;

class CounterController extends Controller
{
    public function index()
    {
        $counters = Counter::ordered()->get();
        return view('admin.counters.index', compact('counters'));
    }

    public function create()
    {
        return view('admin.counters.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'icon' => 'required|string|max:255',
            'number' => 'required|string|max:255',
            'display_text' => 'nullable|string|max:255',
            'title_en' => 'required|string|max:255',
            'title_ar' => 'required|string|max:255',
            'title_fr' => 'nullable|string|max:255',
            'title_es' => 'nullable|string|max:255',
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        Counter::create($data);

        return redirect()->route('admin.counters.index')->with('success', 'تمت الإضافة بنجاح');
    }

    public function edit(Counter $counter)
    {
        return view('admin.counters.edit', compact('counter'));
    }

    public function update(Request $request, Counter $counter)
    {
        $request->validate([
            'icon' => 'required|string|max:255',
            'number' => 'required|string|max:255',
            'display_text' => 'nullable|string|max:255',
            'title_en' => 'required|string|max:255',
            'title_ar' => 'required|string|max:255',
            'title_fr' => 'nullable|string|max:255',
            'title_es' => 'nullable|string|max:255',
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        $counter->update($data);

        return redirect()->route('admin.counters.index')->with('success', 'تم التعديل بنجاح');
    }

    public function destroy(Counter $counter)
    {
        $counter->delete();
        return back()->with('success', 'تم الحذف بنجاح');
    }
}
