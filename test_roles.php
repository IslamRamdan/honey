<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

use App\Models\User;
use Illuminate\Http\Request;

$u = User::where('email', 'ahmad@beeandhoney.com')->first();
if (!$u) {
    die("User not found\n");
}

auth()->login($u);

$request = Request::create('/admin/roles', 'GET');
$response = $kernel->handle($request);

echo "Status Code: " . $response->getStatusCode() . "\n";
if ($response->getStatusCode() == 404) {
    echo "Content:\n" . $response->getContent();
}
