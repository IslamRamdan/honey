<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Traits\CompressesImages;

class SettingController extends Controller
{
    use CompressesImages;
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
                $path = $this->storeCompressedImage($request->file($key), 'settings');
                Setting::updateOrCreate(
                    ['key' => $key],
                    ['value' => $path, 'group' => $group]
                );
            } elseif (in_array($key, ['hero_video', 'catalog_image', 'catalog_link'])) {
                // Skip if no file was uploaded to prevent overwriting with null
                continue;
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
