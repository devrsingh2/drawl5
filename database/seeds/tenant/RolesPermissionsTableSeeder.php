<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class RolesPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles_permissions')->insert([
            'role_id' => 2,
            'permission_id'=> 1,
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d')
        ]);
        DB::table('roles_permissions')->insert([
            'role_id' => 2,
            'permission_id'=> 2,
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d')
        ]);
        DB::table('roles_permissions')->insert([
            'role_id' => 2,
            'permission_id'=> 3,
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d')
        ]);
        DB::table('roles_permissions')->insert([
            'role_id' => 2,
            'permission_id'=> 4,
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d')
        ]);
        DB::table('roles_permissions')->insert([
            'role_id' => 2,
            'permission_id'=> 5,
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d')
        ]);
        DB::table('roles_permissions')->insert([
            'role_id' => 2,
            'permission_id'=> 6,
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d')
        ]);
        DB::table('roles_permissions')->insert([
            'role_id' => 2,
            'permission_id'=> 7,
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d')
        ]);

        DB::table('roles_permissions')->insert([
            'role_id' => 2,
            'permission_id'=> 8,
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d')
        ]);

        DB::table('roles_permissions')->insert([
            'role_id' => 2,
            'permission_id'=> 9,
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d')
        ]);

    }
}
