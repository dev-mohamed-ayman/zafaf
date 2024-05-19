<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('permissions')->delete();

        $permissions = [
            'city',
            'city create',
            'city update',
            'city delete',
            'users and roles',
            'users list',
            'users update',
            'users create',
            'users delete',
            'roles',
            'roles update',
            'roles create',
            'roles delete',
            'analysis',
            'halls',
            'halls list',
            'halls update',
            'halls create',
            'halls delete',
            'halls updates',
            'offers',
            'offers update',
            'offers create',
            'offers delete',
            'orders',
            'company orders',
            'rate orders',
            'settings',
            'blog',
            'meeting record',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(Permission::all());
    }
}
