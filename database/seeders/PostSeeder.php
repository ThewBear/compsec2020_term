<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'id' => 1,
            'user_id'=>1,
            'content' => 'This is a very cool post.',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('posts')->insert([
            'id' => 2,
            'user_id'=>1,
            'content' => 'Another cool post, right there',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
