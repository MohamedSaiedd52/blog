<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'role-show',


            'post-index',
            'post-create',
            'post-edit',
            'post-delete',

            'tag-index',
            'tag-create',
            'tag-edit',
            'tag-delete',


            'category-index',
            'category-create',
            'category-edit',
            'category-delete',


            'user-index',
            'user-create',
            'user-edit',
            'user-delete',

        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
