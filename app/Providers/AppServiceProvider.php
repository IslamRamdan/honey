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
        $this->app['events']->listen(BuildingMenu::class, function (BuildingMenu $event) {
            $event->menu->items = [];

            $locale = app()->getLocale();

            $t = [
                'content_management' => [
                    'ar' => 'إدارة المحتوى',
                    'en' => 'Content Management',
                    'fr' => 'Gestion du contenu',
                    'es' => 'Gestión de contenido',
                ],
                'settings' => [
                    'ar' => 'الإعدادات العامة',
                    'en' => 'Settings',
                    'fr' => 'Paramètres',
                    'es' => 'Configuración',
                ],
                'sliders' => [
                    'ar' => 'السلايدر',
                    'en' => 'Sliders',
                    'fr' => 'Diaporama',
                    'es' => 'Diapositivas',
                ],
                'branches' => [
                    'ar' => 'الفروع والوكلاء',
                    'en' => 'Branches',
                    'fr' => 'Succursales',
                    'es' => 'Sucursales',
                ],
                'certificates' => [
                    'ar' => 'الشهادات',
                    'en' => 'Certificates',
                    'fr' => 'Certificats',
                    'es' => 'Certificados',
                ],
                'counters' => [
                    'ar' => 'العدادات',
                    'en' => 'Counters',
                    'fr' => 'Compteurs',
                    'es' => 'Contadores',
                ],
                'faqs' => [
                    'ar' => 'الأسئلة الشائعة',
                    'en' => 'FAQs',
                    'fr' => 'FAQ',
                    'es' => 'Preguntas frecuentes',
                ],
                'pages' => [
                    'ar' => 'محتوى الصفحات',
                    'en' => 'Pages',
                    'fr' => 'Pages',
                    'es' => 'Páginas',
                ],
                'product_management' => [
                    'ar' => 'إدارة المنتجات',
                    'en' => 'Product Management',
                    'fr' => 'Gestion des produits',
                    'es' => 'Gestión de productos',
                ],
                'blogs' => [
                    'ar' => 'المدونة والأخبار',
                    'en' => 'Blog & News',
                    'fr' => 'Blog et Actualités',
                    'es' => 'Blog y Noticias',
                ],
                'categories' => [
                    'ar' => 'التصنيفات',
                    'en' => 'Categories',
                    'fr' => 'Catégories',
                    'es' => 'Categorías',
                ],
                'products' => [
                    'ar' => 'المنتجات',
                    'en' => 'Products',
                    'fr' => 'Produits',
                    'es' => 'Productos',
                ],
                'system' => [
                    'ar' => 'النظام',
                    'en' => 'System',
                    'fr' => 'Système',
                    'es' => 'Sistema',
                ],
                'seo' => [
                    'ar' => 'إعدادات SEO',
                    'en' => 'SEO Settings',
                    'fr' => 'Paramètres SEO',
                    'es' => 'Configuración SEO',
                ],
                'activity_logs' => [
                    'ar' => 'سجل النشاطات',
                    'en' => 'Activity Log',
                    'fr' => "Journal d'activité",
                    'es' => 'Registro de actividad',
                ],
                'profile' => [
                    'ar' => 'حسابي',
                    'en' => 'Profile',
                    'fr' => 'Mon profil',
                    'es' => 'Mi perfil',
                ],
                'users' => [
                    'ar' => 'المستخدمون',
                    'en' => 'Users',
                    'fr' => 'Utilisateurs',
                    'es' => 'Usuarios',
                ],
            ];

            $tr = fn($key) => $t[$key][$locale] ?? $t[$key]['en'];

            $event->menu->add(
                [
                    'type' => 'fullscreen-widget',
                    'topnav_right' => true,
                ],
                ['header' => $tr('content_management')],
                ['text' => $tr('settings'),    'route' => 'admin.settings.edit',       'icon' => 'fas fa-cog'],
                ['text' => $tr('sliders'),     'route' => 'admin.sliders.index',        'icon' => 'fas fa-images'],
                ['text' => $tr('branches'),    'route' => 'admin.branches.index',       'icon' => 'fas fa-globe'],
                ['text' => $tr('certificates'),'route' => 'admin.certificates.index',  'icon' => 'fas fa-certificate'],
                ['text' => $tr('counters'),    'route' => 'admin.counters.index',       'icon' => 'fas fa-sort-numeric-up'],
                ['text' => $tr('faqs'),        'route' => 'admin.faqs.index',           'icon' => 'fas fa-question-circle'],
                ['text' => $tr('pages'),       'route' => 'admin.pages.index',          'icon' => 'fas fa-file-alt'],
                ['header' => $tr('product_management')],
                ['text' => $tr('blogs'),       'url' => '/blogs',                       'icon' => 'fas fa-blog'],
                ['text' => $tr('categories'),  'url' => '/categories',                  'icon' => 'fas fa-list'],
                ['text' => $tr('products'),    'url' => '/products',                    'icon' => 'fas fa-box'],
                ['header' => $tr('system')],
                ['text' => $tr('seo'),         'route' => 'admin.seo.index',            'icon' => 'fas fa-search'],
                ['text' => $tr('activity_logs'),'route' => 'admin.activity_logs.index','icon' => 'fas fa-history'],
                ['text' => $tr('profile'),     'url' => '/profile',                     'icon' => 'fas fa-user'],
                ['text' => $tr('users'),       'url' => '/users',                       'icon' => 'fas fa-users'],
            );
        });
    }
}
