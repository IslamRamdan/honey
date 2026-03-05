<?php

$dir = __DIR__ . '/app/Models';
$files = glob($dir . '/*.php');

$modelsToLog = ['Blog.php', 'Branch.php', 'Category.php', 'Certificate.php', 'Counter.php', 'Faq.php', 'Page.php', 'Product.php', 'SeoMeta.php', 'Setting.php', 'Slider.php', 'User.php'];

foreach ($files as $file) {
    $basename = basename($file);
    if (!in_array($basename, $modelsToLog)) {
        continue;
    }

    $content = file_get_contents($file);
    if (strpos($content, 'LogsActivity') !== false) {
        continue;
    }

    // Insert use statements after namespace or other use statements
    $useStatements = "use Spatie\Activitylog\Traits\LogsActivity;\nuse Spatie\Activitylog\LogOptions;";
    
    // Find the class definition line
    if (preg_match('/class\s+'.$basename.'\s+/', $content)) {
        // wait, regex for class name without .php
    }
    $className = str_replace('.php', '', $basename);
    
    $content = preg_replace('/(namespace App\\\\Models;)/', "$1\n\n$useStatements", $content);
    
    $traitContent = "\n    use LogsActivity;\n\n    public function getActivitylogOptions(): LogOptions\n    {\n        return LogOptions::defaults()\n            ->logAll()\n            ->logOnlyDirty();\n    }\n";
    
    // insert inside class
    $content = preg_replace('/(class\s+'.$className.'[^{]*{)/', "$1" . $traitContent, $content);
    
    file_put_contents($file, $content);
    echo "Updated $basename\n";
}
echo "Done.\n";
