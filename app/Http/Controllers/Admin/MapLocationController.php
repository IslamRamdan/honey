<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MapLocation;
use Illuminate\Http\Request;

class MapLocationController extends Controller
{
    public function index()
    {
        $locations = MapLocation::ordered()->get();
        return view('admin.map_locations.index', compact('locations'));
    }

    public function create()
    {
        return view('admin.map_locations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title_en' => 'required|string|max:255',
            'title_ar' => 'required|string|max:255',
            'title_fr' => 'nullable|string|max:255',
            'title_es' => 'nullable|string|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'instagram' => 'nullable|url|max:255',
            'facebook' => 'nullable|url|max:255',
            'website' => 'nullable|url|max:255',
            'sort_order' => 'nullable|integer',
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        MapLocation::create($data);

        return redirect()->route('admin.map_locations.index')->with('success', 'تمت الإضافة بنجاح');
    }

    public function edit(MapLocation $mapLocation)
    {
        return view('admin.map_locations.edit', compact('mapLocation'));
    }

    public function update(Request $request, MapLocation $mapLocation)
    {
        $request->validate([
            'title_en' => 'required|string|max:255',
            'title_ar' => 'required|string|max:255',
            'title_fr' => 'nullable|string|max:255',
            'title_es' => 'nullable|string|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'instagram' => 'nullable|url|max:255',
            'facebook' => 'nullable|url|max:255',
            'website' => 'nullable|url|max:255',
            'sort_order' => 'nullable|integer',
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        $mapLocation->update($data);

        return redirect()->route('admin.map_locations.index')->with('success', 'تم التعديل بنجاح');
    }

    public function destroy(MapLocation $mapLocation)
    {
        $mapLocation->delete();
        return back()->with('success', 'تم الحذف بنجاح');
    }
}
