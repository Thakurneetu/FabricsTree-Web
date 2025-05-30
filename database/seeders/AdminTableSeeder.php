<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Create Admin
        User::create([
            'name'          => 'Admin',
            'email'         => 'admin@admin.com',
            'password'      => Hash::make('123456'),
            'email_verified_at' => now(),
        ]);
    }
}
