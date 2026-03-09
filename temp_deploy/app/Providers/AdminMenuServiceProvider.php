<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class AdminMenuServiceProvider extends ServiceProvider
{
    public function boot(Dispatcher $events): void
    {
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            $user = auth()->user();

            if (!$user) {
                return;
            }

            $isSuperAdmin = $user->hasRole('super-admin');

            // ====== القائمة الرئيسية ======
            $event->menu->add(['header' => __('admin.sidebar_main_menu')]);

            $event->menu->add([
                'text' => __('admin.dashboard'),
                'url'  => '/dashboard',
                'icon' => 'fas fa-tachometer-alt',
            ]);

            // ====== إدارة المحتوى ======
            $contentItems = [];

            if ($isSuperAdmin || $user->hasPermissionTo('manage-sliders')) {
                $contentItems[] = [
                    'text' => __('admin.sliders'),
                    'url'  => '/admin/sliders',
                    'icon' => 'fas fa-images',
                ];
            }

            if ($isSuperAdmin || $user->hasPermissionTo('manage-branches')) {
                $contentItems[] = [
                    'text' => __('admin.branches'),
                    'url'  => '/admin/branches',
                    'icon' => 'fas fa-map-marker-alt',
                ];
                $contentItems[] = [
                    'text' => __('admin.manage_map_locations') ?? 'مواقع الخريطة',
                    'url'  => '/admin/map_locations',
                    'icon' => 'fas fa-map-marked-alt',
                ];
            }

            if ($isSuperAdmin || $user->hasPermissionTo('manage-certificates')) {
                $contentItems[] = [
                    'text' => __('admin.certificates'),
                    'url'  => '/admin/certificates',
                    'icon' => 'fas fa-certificate',
                ];
            }

            if ($isSuperAdmin || $user->hasPermissionTo('manage-counters')) {
                $contentItems[] = [
                    'text' => __('admin.counters'),
                    'url'  => '/admin/counters',
                    'icon' => 'fas fa-sort-numeric-up',
                ];
            }

            if ($isSuperAdmin || $user->hasPermissionTo('manage-faqs')) {
                $contentItems[] = [
                    'text' => __('admin.faqs'),
                    'url'  => '/admin/faqs',
                    'icon' => 'fas fa-question-circle',
                ];
            }

            if ($isSuperAdmin || $user->hasPermissionTo('manage-pages')) {
                $contentItems[] = [
                    'text' => __('admin.pages'),
                    'url'  => '/admin/pages',
                    'icon' => 'fas fa-file-alt',
                ];
            }

            if ($isSuperAdmin || $user->hasPermissionTo('manage-blogs')) {
                $contentItems[] = [
                    'text' => __('admin.blogs'),
                    'url'  => '/blogs',
                    'icon' => 'fas fa-blog',
                ];
            }

            if (count($contentItems) > 0) {
                $event->menu->add(['header' => __('admin.sidebar_content')]);
                foreach ($contentItems as $item) {
                    $event->menu->add($item);
                }
            }

            // ====== إدارة المنتجات ======
            $productItems = [];

            if ($isSuperAdmin || $user->hasPermissionTo('manage-categories')) {
                $productItems[] = [
                    'text' => __('admin.categories'),
                    'url'  => '/categories',
                    'icon' => 'fas fa-list',
                ];
            }

            if ($isSuperAdmin || $user->hasPermissionTo('manage-products')) {
                $productItems[] = [
                    'text' => __('admin.products'),
                    'url'  => '/products',
                    'icon' => 'fas fa-box',
                ];
            }

            if (count($productItems) > 0) {
                $event->menu->add(['header' => __('admin.sidebar_products')]);
                foreach ($productItems as $item) {
                    $event->menu->add($item);
                }
            }

            // ====== النظام ======
            $systemItems = [];

            if ($isSuperAdmin || $user->hasPermissionTo('manage-seo')) {
                $systemItems[] = [
                    'text' => __('admin.seo'),
                    'url'  => '/admin/seo',
                    'icon' => 'fas fa-search',
                ];
            }

            if ($isSuperAdmin || $user->hasPermissionTo('manage-settings')) {
                $systemItems[] = [
                    'text' => __('admin.settings'),
                    'url'  => '/admin/settings',
                    'icon' => 'fas fa-cog',
                ];
            }

            if ($isSuperAdmin || $user->hasPermissionTo('manage-users')) {
                $systemItems[] = [
                    'text' => __('admin.users'),
                    'url'  => '/users',
                    'icon' => 'fas fa-users',
                ];
            }

            if ($isSuperAdmin || $user->hasPermissionTo('manage-roles')) {
                $systemItems[] = [
                    'text' => __('admin.roles'),
                    'url'  => '/admin/roles',
                    'icon' => 'fas fa-user-shield',
                ];
            }

            if ($isSuperAdmin || $user->hasPermissionTo('view-activity-logs')) {
                $systemItems[] = [
                    'text' => __('admin.activity_logs'),
                    'url'  => '/admin/activity_logs',
                    'icon' => 'fas fa-history',
                ];
            }

            if (count($systemItems) > 0) {
                $event->menu->add(['header' => __('admin.sidebar_system')]);
                foreach ($systemItems as $item) {
                    $event->menu->add($item);
                }
            }
        });
    }

    public function register(): void
    {
        //
    }
}
