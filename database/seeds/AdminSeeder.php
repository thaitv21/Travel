<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id' => config('constains.is_admin'),
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('111111'),
            'status' => config('constains.show'),
        ]);
    }
}
