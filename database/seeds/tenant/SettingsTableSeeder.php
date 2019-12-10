<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //main information
        DB::table('settings')->insert([
            ['name' => "info", 'key' => 'name', 'value' => 'KSSL', 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
            ['name' => "info", 'key' => 'address', 'value' => 'Pune', 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
            ['name' => "info", 'key' => 'email', 'value' => 'rsingh2@katalysttech.com', 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
            ['name' => "info", 'key' => 'phone', 'value' => '9762137636', 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
            ['name' => "info", 'key' => 'zipcode', 'value' => '411013', 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
            ['name' => "info", 'key' => 'vendor_notification', 'value' => 'auto', 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
            ['name' => "info", 'key' => 'token_amount', 'value' => '10', 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
        ]);

        //smtp information
        DB::table('settings')->insert([
            ['name' => "smtp", 'key' => 'driver', 'value' => 'smtp', 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
            ['name' => "smtp", 'key' => 'host', 'value' => 'smtp.gmail.com', 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
            ['name' => "smtp", 'key' => 'port', 'value' => '537', 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
            ['name' => "smtp", 'key' => 'username', 'value' => 'developer.pipl@gmail.com', 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
            ['name' => "smtp", 'key' => 'password', 'value' => 'panaceadeveloper', 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
            ['name' => "smtp", 'key' => 'encryption', 'value' => 'tls', 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
            ['name' => "smtp", 'key' => 'address', 'value' => 'rsingh2@katalysttech.com', 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
            ['name' => "smtp", 'key' => 'name', 'value' => 'KSSL', 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
        ]);
    }
}
