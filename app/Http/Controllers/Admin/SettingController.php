<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function edit()
    {
        $settings = Setting::all()->groupBy('group');
        return view('admin.settings.edit', compact('settings'));
    }

    public function update(Request $request)
    {
        $data = $request->except('_token', '_method');

        foreach ($data as $key => $value) {
            $group = 'general';
            if (in_array($key, ['phone', 'email', 'whatsapp']) || str_starts_with($key, 'address_')) {
                $group = 'contact';
            } elseif (in_array($key, ['instagram', 'facebook', 'linkedin'])) {
                $group = 'social';
            }

            if ($request->hasFile($key)) {
                $path = $request->file($key)->store('settings', 'public');
                Setting::where('key', $key)->update(['value' => $path]);
            } else {
                Setting::updateOrCreate(
                    ['key' => $key],
                    ['value' => $value, 'group' => $group]
                );
            }
        }

        return redirect()->route('admin.settings.edit')->with('success', __('messages.updated_successfully') ?? 'تم التحديث بنجاح');
    }
}
