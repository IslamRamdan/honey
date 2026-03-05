<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index()
    {
        $branches = Branch::ordered()->get();
        return view('admin.branches.index', compact('branches'));
    }

    public function create()
    {
        return view('admin.branches.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'country_en' => 'required|string|max:255',
            'country_ar' => 'required|string|max:255',
            'country_fr' => 'nullable|string|max:255',
            'country_es' => 'nullable|string|max:255',
            'description_en' => 'required|string',
            'description_ar' => 'required|string',
            'description_fr' => 'nullable|string',
            'description_es' => 'nullable|string',
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        Branch::create($data);

        return redirect()->route('admin.branches.index')->with('success', 'تمت الإضافة بنجاح');
    }

    public function edit(Branch $branch)
    {
        return view('admin.branches.edit', compact('branch'));
    }

    public function update(Request $request, Branch $branch)
    {
        $request->validate([
            'country_en' => 'required|string|max:255',
            'country_ar' => 'required|string|max:255',
            'country_fr' => 'nullable|string|max:255',
            'country_es' => 'nullable|string|max:255',
            'description_en' => 'required|string',
            'description_ar' => 'required|string',
            'description_fr' => 'nullable|string',
            'description_es' => 'nullable|string',
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        $branch->update($data);

        return redirect()->route('admin.branches.index')->with('success', 'تم التعديل بنجاح');
    }

    public function destroy(Branch $branch)
    {
        $branch->delete();
        return back()->with('success', 'تم الحذف بنجاح');
    }
}
