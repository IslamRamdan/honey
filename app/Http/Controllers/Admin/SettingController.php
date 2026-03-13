<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Support\Security;
use App\Traits\CompressesImages;
use Illuminate\Http\Request;

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
        $data = $request->validate([
            'address_ar' => 'nullable|string|max:500',
            'address_en' => 'nullable|string|max:500',
            'address_fr' => 'nullable|string|max:500',
            'address_es' => 'nullable|string|max:500',
            'phone' => 'nullable|string|max:50',
            'email' => 'nullable|email:rfc|max:255',
            'whatsapp' => 'nullable|string|max:50',
            'instagram' => 'nullable|url|max:255',
            'facebook' => 'nullable|url|max:255',
            'linkedin' => 'nullable|url|max:255',
            'location_link' => 'nullable|url|max:255',
            'location_ar' => 'nullable|string|max:255',
            'location_en' => 'nullable|string|max:255',
            'location_fr' => 'nullable|string|max:255',
            'location_es' => 'nullable|string|max:255',
            'catalog_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'catalog_link' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
            'hero_video' => 'nullable|file|mimetypes:video/mp4,video/webm,video/ogg,video/quicktime|max:51200',
        ]);

        foreach ($data as $key => $value) {
            $group = 'general';

            if (in_array($key, ['phone', 'email', 'whatsapp'], true) || str_starts_with($key, 'address_')) {
                $group = 'contact';
            } elseif (in_array($key, ['instagram', 'facebook', 'linkedin', 'location_link'], true)) {
                $group = 'social';
            }

            if ($request->hasFile($key)) {
                $path = match ($key) {
                    'catalog_image' => $this->storeCompressedImage($request->file($key), 'settings/images'),
                    'catalog_link' => $this->storeFileToPublic($request->file($key), 'settings/catalogs'),
                    'hero_video' => $this->storeFileToPublic($request->file($key), 'settings/videos'),
                    default => $this->storeCompressedImage($request->file($key), 'settings/images'),
                };

                Setting::updateOrCreate(
                    ['key' => $key],
                    ['value' => $path, 'group' => $group, 'type' => $this->typeForKey($key)]
                );

                continue;
            }

            if (in_array($key, ['instagram', 'facebook', 'linkedin', 'location_link'], true)) {
                $value = Security::safeExternalUrl($value, '');
            }

            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value, 'group' => $group, 'type' => $this->typeForKey($key)]
            );
        }

        return redirect()->route('admin.settings.edit')->with('success', __('messages.updated_successfully') ?? 'ØªÙ… Ø§Ù„ØªØ­Ø¯ÙŠØ« Ø¨Ù†Ø¬Ø§Ø­');
    }

    private function typeForKey(string $key): string
    {
        return match ($key) {
            'catalog_link' => 'file',
            'catalog_image' => 'image',
            'hero_video' => 'video',
            'instagram', 'facebook', 'linkedin', 'location_link' => 'url',
            default => 'text',
        };
    }
}
