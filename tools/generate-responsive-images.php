<?php

declare(strict_types=1);

$baseDir = dirname(__DIR__);

if (!extension_loaded('gd')) {
    fwrite(STDERR, "GD extension is required.\n");
    exit(1);
}

/**
 * @return resource|\GdImage
 */
function loadImageResource(string $path)
{
    $type = @exif_imagetype($path);

    return match ($type) {
        IMAGETYPE_JPEG => imagecreatefromjpeg($path),
        IMAGETYPE_PNG => imagecreatefrompng($path),
        IMAGETYPE_WEBP => imagecreatefromwebp($path),
        default => null,
    };
}

function ensureDirectory(string $path): void
{
    if (!is_dir($path) && !mkdir($path, 0775, true) && !is_dir($path)) {
        throw new RuntimeException("Unable to create directory: {$path}");
    }
}

function resizeToWebp(string $source, string $target, int $targetWidth, int $quality): bool
{
    $image = loadImageResource($source);

    if (!$image) {
        fwrite(STDERR, "Skipping unsupported image: {$source}\n");
        return false;
    }

    $originalWidth = imagesx($image);
    $originalHeight = imagesy($image);

    if ($originalWidth <= $targetWidth) {
        imagedestroy($image);
        return false;
    }

    $targetHeight = (int) round(($originalHeight / $originalWidth) * $targetWidth);
    $canvas = imagecreatetruecolor($targetWidth, $targetHeight);

    imagealphablending($canvas, false);
    imagesavealpha($canvas, true);
    $transparent = imagecolorallocatealpha($canvas, 0, 0, 0, 127);
    imagefilledrectangle($canvas, 0, 0, $targetWidth, $targetHeight, $transparent);

    imagecopyresampled(
        $canvas,
        $image,
        0,
        0,
        0,
        0,
        $targetWidth,
        $targetHeight,
        $originalWidth,
        $originalHeight
    );

    ensureDirectory(dirname($target));
    $saved = imagewebp($canvas, $target, $quality);

    imagedestroy($canvas);
    imagedestroy($image);

    return $saved;
}

function generateResponsiveSet(string $baseDir, string $sourceDir, string $outputDir, array $widths, int $quality): void
{
    $absoluteSourceDir = $baseDir . DIRECTORY_SEPARATOR . $sourceDir;
    $absoluteOutputDir = $baseDir . DIRECTORY_SEPARATOR . $outputDir;

    if (!is_dir($absoluteSourceDir)) {
        return;
    }

    $iterator = new FilesystemIterator($absoluteSourceDir, FilesystemIterator::SKIP_DOTS);

    foreach ($iterator as $fileInfo) {
        if (!$fileInfo->isFile()) {
            continue;
        }

        $sourcePath = $fileInfo->getPathname();
        $filename = pathinfo($sourcePath, PATHINFO_FILENAME);

        foreach ($widths as $width) {
            $targetPath = $absoluteOutputDir . DIRECTORY_SEPARATOR . $filename . "-{$width}.webp";
            resizeToWebp($sourcePath, $targetPath, $width, $quality);
        }
    }
}

function generateSingleResponsiveImage(string $baseDir, string $sourcePath, string $targetPath, int $width, int $quality): void
{
    $absoluteSource = $baseDir . DIRECTORY_SEPARATOR . $sourcePath;
    $absoluteTarget = $baseDir . DIRECTORY_SEPARATOR . $targetPath;

    if (!is_file($absoluteSource)) {
        return;
    }

    resizeToWebp($absoluteSource, $absoluteTarget, $width, $quality);
}

generateResponsiveSet(
    $baseDir,
    'storage/app/public/sliders',
    'storage/app/public/responsive/sliders',
    [480, 768, 960],
    80
);

generateResponsiveSet(
    $baseDir,
    'storage/app/public/pages',
    'storage/app/public/responsive/pages',
    [480, 720, 960],
    80
);

generateSingleResponsiveImage(
    $baseDir,
    'public/assets/light-logo.png',
    'public/assets/responsive/light-logo-240.webp',
    240,
    82
);

generateSingleResponsiveImage(
    $baseDir,
    'public/assets/light-logo.png',
    'public/assets/responsive/light-logo-320.webp',
    320,
    82
);

generateSingleResponsiveImage(
    $baseDir,
    'public/assets/footer-logo.png',
    'public/assets/responsive/footer-logo-320.webp',
    320,
    80
);

generateSingleResponsiveImage(
    $baseDir,
    'public/assets/footer-logo.png',
    'public/assets/responsive/footer-logo-540.webp',
    540,
    80
);

generateSingleResponsiveImage(
    $baseDir,
    'public/assets/logo.png',
    'public/assets/responsive/logo-poster.webp',
    320,
    78
);

echo "Responsive image generation complete.\n";
