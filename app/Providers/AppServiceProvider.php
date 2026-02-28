<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
use App\Models\SeoMeta;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer('*', function ($view) {
            $routeName = request()->route()?->getName();

            // استثناء صفحات الادمن
            if (str_starts_with($routeName, 'admin.')) {
                return;
            }

            $seo = SeoMeta::where('page', $routeName)->first();
            $view->with('seo', $seo);
        });


        // تعديل القائمة (menu)
        $this->app['events']->listen(BuildingMenu::class, function (BuildingMenu $event) {
            $event->menu->items = []; // مسح العناصر الحالية (اختياري)

            $event->menu->add(
                [
                    'type' => 'fullscreen-widget',
                    'topnav_right' => true,
                ],
                [
                    'text' => app()->getLocale() === 'ar' ? 'المدونة والاخبار' : 'Blog And News',
                    'url' => '/blogs',
                    'icon' => 'fas fa-blog',
                ],
                [
                    'text' => app()->getLocale() === 'ar' ? 'التصنيفات' : 'Categories',
                    'url' => '/categories',
                    'icon' => 'fas fa-list',
                ],
                [
                    'text' => app()->getLocale() === 'ar' ? 'المنتجات' : 'Products',
                    'url' => '/products',
                    'icon' => 'fas fa-list',
                ],
                [
                    'text' => app()->getLocale() === 'ar' ? 'إعدادات SEO' : 'SEO Settings',
                    'route' => 'admin.seo.index',
                    'icon' => 'fas fa-search',
                ],
                [
                    'text' => app()->getLocale() === 'ar' ? 'حسابي' : 'profile',
                    'url' => '/profile',
                    'icon' => 'fas fa-user',
                ],
                [
                    'text' => app()->getLocale() === 'ar' ? 'المستخدمين' : 'Users',
                    'url' => '/users',
                    'icon' => 'fas fa-users',
                ],
            );
        });
    }
}
