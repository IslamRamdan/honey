<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait CompressesImages
{
    /**
     * Store and compress an uploaded image to storage/app/public (via Storage disk).
     * Outputs WebP format for optimal web performance.
     *
     * @param UploadedFile $file The uploaded file
     * @param string $path The directory path inside storage/app/public
     * @param int $quality WebP compression quality (0-100)
     * @param int $maxWidth Max width to resize to
     * @return string The stored file path (relative to storage/app/public)
     */
    protected function storeCompressedImage(UploadedFile $file, string $path, int $quality = 82, int $maxWidth = 1920): string
    {
        $img = $this->createImageResource($file);

        if (!$img) {
            // Fallback: store without compression
            return $file->store($path, 'public');
        }

        $filename = Str::random(40) . '.webp';
        $fullPath = $path . '/' . $filename;

        $img = $this->resizeIfNeeded($img, $maxWidth);

        // Ensure directory exists
        Storage::disk('public')->makeDirectory($path);

        // Save optimized WebP
        $absolutePath = Storage::disk('public')->path($fullPath);
        imagewebp($img, $absolutePath, $quality);
        imagedestroy($img);

        return $fullPath;
    }

    /**
     * Store and compress an uploaded image directly to a public directory.
     * Outputs WebP format for optimal web performance.
     *
     * @param UploadedFile $file The uploaded file
     * @param string $publicPath The directory inside public_path() e.g. 'images/categories'
     * @param int $quality WebP compression quality (0-100)
     * @param int $maxWidth Max width to resize to
     * @return string Only the generated filename e.g. 'filename.webp'
     */
    protected function storeCompressedImageToPublic(UploadedFile $file, string $publicPath, int $quality = 82, int $maxWidth = 1920): string
    {
        $img = $this->createImageResource($file);

        if (!$img) {
            // Fallback: store without compression
            $filename = time() . '_' . Str::random(10) . '.' . $file->extension();
            $file->move(public_path($publicPath), $filename);
            return $filename;
        }

        $filename = time() . '_' . Str::random(10) . '.webp';

        $img = $this->resizeIfNeeded($img, $maxWidth);

        // Ensure directory exists
        $dir = public_path($publicPath);
        if (!file_exists($dir)) {
            mkdir($dir, 0755, true);
        }

        // Save optimized WebP
        imagewebp($img, $dir . '/' . $filename, $quality);
        imagedestroy($img);

        return $filename;
    }

    /**
     * Create a GD image resource from an uploaded file.
     * Handles JPEG, PNG, and WebP, flattening transparency to white.
     */
    private function createImageResource(UploadedFile $file)
    {
        $mime = $file->getMimeType();

        if (!in_array($mime, ['image/jpeg', 'image/png', 'image/webp'])) {
            return null;
        }

        switch ($mime) {
            case 'image/jpeg':
                $img = @imagecreatefromjpeg($file->getRealPath());
                break;
            case 'image/png':
                $img = @imagecreatefrompng($file->getRealPath());
                break;
            case 'image/webp':
                $img = @imagecreatefromwebp($file->getRealPath());
                break;
            default:
                return null;
        }

        if (!$img) {
            return null;
        }

        // Handle transparency for PNG → WebP (flatten to white background)
        if ($mime === 'image/png') {
            $w = imagesx($img);
            $h = imagesy($img);
            $bg = imagecreatetruecolor($w, $h);
            $white = imagecolorallocate($bg, 255, 255, 255);
            imagefilledrectangle($bg, 0, 0, $w, $h, $white);
            // Preserve alpha
            imagealphablending($bg, true);
            imagecopy($bg, $img, 0, 0, 0, 0, $w, $h);
            imagedestroy($img);
            $img = $bg;
        }

        return $img;
    }

    /**
     * Resize an image resource if it exceeds the max width.
     */
    private function resizeIfNeeded($img, int $maxWidth)
    {
        $w = imagesx($img);
        $h = imagesy($img);

        if ($w > $maxWidth) {
            $newH = intval($h * $maxWidth / $w);
            $resized = imagecreatetruecolor($maxWidth, $newH);
            // Preserve alpha for WebP
            imagealphablending($resized, false);
            imagesavealpha($resized, true);
            imagecopyresampled($resized, $img, 0, 0, 0, 0, $maxWidth, $newH, $w, $h);
            imagedestroy($img);
            return $resized;
        }

        return $img;
    }
}
