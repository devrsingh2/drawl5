<?php

use Illuminate\Database\Seeder;

//use RolesTableSeeder;
//use PermissionsTableSeeder;
//use CategoryTableSeeder;
//use RolesPermissionsTableSeeder;

class TenantTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            SettingsTableSeeder::class,
            RolesTableSeeder::class,
            PermissionsTableSeeder::class,
            CategoryTableSeeder::class,
            RolesPermissionsTableSeeder::class,
        ]);
    }
}

