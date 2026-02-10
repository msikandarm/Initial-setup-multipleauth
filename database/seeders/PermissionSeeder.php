<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissionGroups = [
            'Pages' => ['show-pages', 'add-page', 'edit-page', 'delete-page', 'update-page-status'],
            'Settings' => ['show-settings', 'update-settings'],
        ];

        foreach ($permissionGroups as $group => $permissions) {
            $groupPermission = Permission::updateOrCreate(
                ['name' => $group, 'guard_name' => 'web'],
                ['name' => $group]
            );

            foreach ($permissions as $permission) {
                Permission::updateOrCreate(
                    ['permission_id' => $groupPermission->id, 'name' => $permission, 'guard_name' => 'web'],
                    ['name' => $permission]
                );
            }
        }
    }
}
