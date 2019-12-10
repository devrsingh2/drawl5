<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            'id' => 1,
            'name' => 'Manage Settings',
            'module' => 'settings',
            'status' => 'active',
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d')
        ]);

        DB::table('permissions')->insert([
            'id' => 2,
            'name' => 'Manage Roles',
            'module' => 'roles',
            'status' => 'active',
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d')
        ]);

        DB::table('permissions')->insert([
            'id' => 3,
            'name' => 'Manage Categories',
            'module' => 'categories',
            'status' => 'active',
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d')
        ]);

        DB::table('permissions')->insert([
            'id' => 4,
            'name' => 'Manage Admin',
            'module' => 'administrator',
            'status' => 'active',
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d')
        ]);

        DB::table('permissions')->insert([
            'id' => 5,
            'name' => 'Manage Vendors',
            'module' => 'vendors',
            'status' => 'active',
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d')
        ]);

        DB::table('permissions')->insert([
            'id' => 6,
            'name' => 'Manage Customers',
            'module' => 'customers',
            'status' => 'active',
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d')
        ]);

        DB::table('permissions')->insert([
            'id' => 7,
            'name' => 'Manage CMS',
            'module' => 'cms',
            'status' => 'active',
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d')
        ]);

        DB::table('permissions')->insert([
            'id' => 8,
            'name' => 'Manage Products',
            'module' => 'products',
            'status' => 'active',
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d')
        ]);

        DB::table('permissions')->insert([
            'id' => 9,
            'name' => 'Manage Requirements',
            'module' => 'requirements',
            'status' => 'active',
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d')
        ]);

    }
}
