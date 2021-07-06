<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::create([
            'name' => 'Admin',
            'level' => 1,
            'email' => 'admin@admin.com',
            'password' => bcrypt('1234567890'),
            'remember_token' => Str::random(50),
        ]);
    }
}
