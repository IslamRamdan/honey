<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\Admin\CounterController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactController;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\Branch;
use App\Models\Certificate;
use App\Models\Counter;
use App\Models\Faq;
use App\Models\Page;

Route::get('/', function () {
    $settings = Setting::allAsArray();
    $sliders = Slider::active()->ordered()->get();
    // Exclude Jordan (JO), Iraq (IQ), Sudan (SD), Libya (LY) from the grid boxes
    $branches = Branch::active()->whereNotIn('country_code', ['JO', 'IQ', 'SD', 'LY'])->ordered()->get();
    $mapLocations = \App\Models\MapLocation::active()->ordered()->get();
    $certificates = Certificate::active()->ordered()->get();
    $counters = Counter::active()->ordered()->get();
    $aboutBrief = Page::getBySlug('about-brief');
    $seo = \App\Models\SeoMeta::where('page', 'home')->first();

    return view('welcome', compact('settings', 'sliders', 'branches', 'mapLocations', 'certificates', 'counters', 'aboutBrief', 'seo'));
})->name('home');

Route::get('/sitemap.xml', function () {

    $products = Product::all();
    $categories = Category::all();
    $blogs = Blog::all();

    return response()
        ->view('sitemap', compact('products', 'categories', 'blogs'))
        ->header('Content-Type', 'application/xml');
});

Route::get('locale/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'ar', 'fr', 'es'])) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
})->name('locale.switch');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Categories & Products (with permission middleware)
    Route::middleware('permission:manage-categories')->group(function () {
        Route::get('categories/{id}/products', [CategoryController::class, 'products'])->name('categories.products');
        Route::resource('categories', CategoryController::class);
    });

    Route::middleware('permission:manage-products')->group(function () {
        Route::resource('products', ProductController::class);
    });

    // Admin routes
    Route::prefix('admin')->name('admin.')->group(function () {

        Route::middleware('permission:manage-seo')->group(function () {
            Route::resource('seo', \App\Http\Controllers\Admin\SeoMetaController::class);
        });

        Route::middleware('permission:manage-settings')->group(function () {
            Route::get('settings', [SettingController::class, 'edit'])->name('settings.edit');
            Route::put('settings', [SettingController::class, 'update'])->name('settings.update');
        });

        Route::middleware('permission:manage-sliders')->group(function () {
            Route::resource('sliders', SliderController::class);
        });

        Route::middleware('permission:manage-branches')->group(function () {
            Route::resource('branches', BranchController::class);
            Route::resource('map_locations', MapLocationController::class);
        });

        Route::middleware('permission:manage-certificates')->group(function () {
            Route::resource('certificates', CertificateController::class);
            Route::delete('certificates/{certificate}/image/{index}', [CertificateController::class, 'deleteImage'])->name('certificates.deleteImage');
        });

        Route::middleware('permission:manage-counters')->group(function () {
            Route::resource('counters', CounterController::class);
        });

        Route::middleware('permission:manage-faqs')->group(function () {
            Route::resource('faqs', FaqController::class);
        });

        Route::middleware('permission:manage-pages')->group(function () {
            Route::resource('pages', PageController::class);
            Route::delete('pages/{page}/image/{index}', [PageController::class, 'deleteImage'])->name('pages.deleteImage');
        });

        Route::middleware('permission:view-activity-logs')->group(function () {
            Route::resource('activity_logs', \App\Http\Controllers\Admin\ActivityLogController::class)->only(['index', 'show']);
        });

        // Roles management (requires manage-roles permission)
        Route::middleware('permission:manage-roles')->group(function () {
            Route::resource('roles', RoleController::class);
        });
    });

    // Users management (requires manage-users permission)
    Route::middleware('permission:manage-users')->group(function () {
        Route::resource('users', UserController::class);
    });
});

// من نحن
Route::get('/about-us', function () {
    $settings = Setting::allAsArray();
    $faqs = Faq::active()->ordered()->get();
    $vision = Page::getBySlug('vision');
    $mission = Page::getBySlug('mission');
    $values = Page::where('slug', 'like', 'value-%')->active()->ordered()->get();
    $whyUsCards = Page::where('slug', 'like', 'why-us-%')->active()->ordered()->get();
    $manufacturingPhilosophy = Page::getBySlug('manufacturing-philosophy');
    $aboutPage = Page::getBySlug('about');
    $seo = \App\Models\SeoMeta::where('page', 'about-us')->first();

    return view('about-us', compact('settings', 'faqs', 'vision', 'mission', 'values', 'whyUsCards', 'manufacturingPhilosophy', 'aboutPage', 'seo'));
})->name('about');

// تواصل معنا
Route::get('/contact-us', function () {
    $settings = Setting::allAsArray();
    $seo = \App\Models\SeoMeta::where('page', 'contact-us')->first();
    return view('contact-us', compact('settings', 'seo'));
})->name('contact');

Route::post('/contact/submit', [ContactController::class, 'submit'])->name('contact.submit');

// الأخبار
Route::get('/news', function () {
    $seo = \App\Models\SeoMeta::where('page', 'news')->first();
    return view('news', compact('seo'));
})->name('news');

// التصنيفات
Route::get('/categorey', function () {
    $categories = Category::paginate(6); // 9 كاتوجري لكل صفحة
    $seo = \App\Models\SeoMeta::where('page', 'categories')->first();

    return view('categories', compact('categories', 'seo'));
})->name('categories');

// كل المدونات
Route::get('/all-blogs', function () {
    $news = Blog::where('status', 'blog')->latest()->paginate(9);
    $seo = \App\Models\SeoMeta::where('page', 'all-blogs')->first();

    return view('all-blogs', compact('news', 'seo'));
})->name('all-blogs');
// كل الاخبار
Route::get('/all-news', function () {
    $news = Blog::where('status', 'new')->latest()->paginate(9);
    $seo = \App\Models\SeoMeta::where('page', 'all-news')->first();

    return view('all-news', compact('news', 'seo'));
})->name('all-news');


// تفاصيل المدونة
Route::get('/blog/{id}', function ($id) {

    $blog = Blog::findOrFail($id);
    $latestBlogs = Blog::where('status', $blog->status)->where('id', '!=', $id)->latest()->take(3)->get();
    $relatedBlogs = Blog::where('id', '!=', $id)->where('status', $blog->status)->latest()->take(3)->get();

    return view('blog-details', compact('blog', 'latestBlogs', 'relatedBlogs'));
})->name('news.show');



Route::get('/categorey/{category}', [CategoryController::class, 'showProducts'])->name('categories.show.products');

Route::middleware(['auth', 'permission:manage-blogs'])->group(function () {
    Route::resource('blogs', BlogController::class);
    Route::delete('blogs/{blog}/image/{index}', [BlogController::class, 'deleteImage'])->name('blogs.deleteImage');
    Route::delete('/blogs/{blog}/video/{index}', [BlogController::class, 'deleteVideo'])
        ->name('blogs.video.delete');
});

require __DIR__ . '/auth.php';
