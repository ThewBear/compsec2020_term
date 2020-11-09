<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            'id' => 1,
            'user_id'=>1,
            'post_id'=>1,
            'content' => 'Thank you, very cool',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
