<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Basic User',
            'email' => 'user@gmail.com',
            'password' => Hash::make('user'),
            'role' => User::DEFAULT_TYPE,
        ]);
        DB::table('users')->insert([
            'id' => 2,
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'role' => User::ADMIN_TYPE,
        ]);
    }
}
