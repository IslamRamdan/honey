<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        $permissions = [
            'manage-users',
            'manage-roles',
            'manage-settings',
            'manage-sliders',
            'manage-branches',
            'manage-certificates',
            'manage-counters',
            'manage-faqs',
            'manage-pages',
            'manage-seo',
            'manage-blogs',
            'manage-categories',
            'manage-products',
            'view-activity-logs',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Create roles and assign permissions
        $superAdmin = Role::firstOrCreate(['name' => 'super-admin']);
        $superAdmin->syncPermissions(Permission::all());

        $admin = Role::firstOrCreate(['name' => 'admin']);
        $admin->syncPermissions([
            'manage-settings',
            'manage-sliders',
            'manage-branches',
            'manage-certificates',
            'manage-counters',
            'manage-faqs',
            'manage-pages',
            'manage-seo',
            'manage-blogs',
            'manage-categories',
            'manage-products',
            'view-activity-logs',
        ]);

        $editor = Role::firstOrCreate(['name' => 'editor']);
        $editor->syncPermissions([
            'manage-blogs',
            'manage-pages',
            'manage-faqs',
            'manage-products',
            'manage-categories',
        ]);
    }
}
