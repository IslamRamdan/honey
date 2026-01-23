<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SeoSettingController;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Product;

Route::get('/', function () {
    $products = Product::latest()->paginate(9);
    return view('welcome', compact('products'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('categories/{id}/products', [CategoryController::class, 'products'])->name('categories.products');
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::get('/admin/seo', [SeoSettingController::class, 'edit'])->name('seo.edit');
    Route::post('/admin/seo', [SeoSettingController::class, 'update'])->name('seo.update');
});

// من نحن
Route::get('/about-us', function () {
    return view('about-us');
})->name('about');

// تواصل معنا
Route::get('/contact-us', function () {
    return view('contact-us');
})->name('contact');

// الأخبار
Route::get('/news', function () {
    return view('news');
})->name('news');

// التصنيفات
Route::get('/categorey', function () {
    $categories = Category::paginate(6); // 9 كاتوجري لكل صفحة

    return view('categories', compact('categories'));
})->name('categories');

// كل المدونات
Route::get('/all-blogs', function () {
    $news = Blog::where('status', 'blog')->latest()->paginate(9);

    return view('all-blogs', compact('news'));
})->name('all-blogs');
// كل الاخبار
Route::get('/all-news', function () {
    $news = Blog::where('status', 'new')->latest()->paginate(9);

    return view('all-news', compact('news'));
})->name('all-news');


// تفاصيل المدونة
Route::get('/blog/{id}', function ($id) {

    $latestBlogs = Blog::where('status', 'new')->latest()->take(3)->get();
    $blog = Blog::findOrFail($id);
    $relatedBlogs = Blog::where('id', '!=', $id)->where('status', 'blog')->latest()->take(3)->get();

    return view('blog-details', compact('blog', 'latestBlogs', 'relatedBlogs'));
})->name('news.show');



Route::get('/categorey/{category}', [CategoryController::class, 'showProducts'])->name('categories.show.products');

Route::resource('blogs', BlogController::class);
Route::put('blogs/{blog}', [BlogController::class, 'update'])->name('blogs.update');
Route::delete('blogs/{blog}/image/{index}', [BlogController::class, 'deleteImage'])->name('blogs.deleteImage');
Route::delete('/blogs/{blog}/video/{index}', [BlogController::class, 'deleteVideo'])
    ->name('blogs.video.delete');

require __DIR__ . '/auth.php';
