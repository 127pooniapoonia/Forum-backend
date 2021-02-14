<?php

use Illuminate\Database\Seeder;

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
            'user_id' => Str::random(10),
            'comment' => Str::random(10),
            'topic_id' => Str::random(10),
        ]);
    }
}
