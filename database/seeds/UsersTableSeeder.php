<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => "Katalyst Administrator",
                'email' => 'rsingh2@katalysttech.com',
                'email_verified_at' => \Carbon\Carbon::now()->format('Y-m-d'),
                'password' => bcrypt('Pass@2019'),
                'role' => 1,
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d')
            ],
        ]);
    }
}
