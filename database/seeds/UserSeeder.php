<?php

use App\post;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        factory(App\User::class, 50)->create()->each(function ($user) {
//            $user->post()->save(factory(Post::class,2)->make());
//        });
//        factory(App\Post::class, 50)->create()->each(function ($post) {
//            factory(App\Comment::class,2)->create([
//                'post_id'=>$post->id,
//                'user_id'=>User::all()->random()->id
//            ])->each(function($comment){
//                factory(App\Reply::class,4)->create([
//                    'post_id'=> $comment->post_id,
//                    'comment_id'=>$comment->id,
//                    'user_id'=>User::all()->random()->id
//                ]);
//            });
//
//            factory(App\Comment::class,2)->create([
//                'post_id'=>$post->id,
//                'user_id'=>User::all()->random()->id
//            ])->each(function($comment){
//                factory(App\Reply::class,4)->create([
//                    'post_id'=> $comment->post_id,
//                    'comment_id'=>$comment->id,
//                    'user_id'=>User::all()->random()->id
//                ]);
//            });
//        });

        $this->createTopic();
    }


    public function createTopic(){
        factory(App\Topic::class,25)->create()->each(function(){
            factory(App\Post::class,4)->create([
                'topic_id'=> \App\Topic::all()->random()->id
            ])->each(function($post){
                factory(App\Comment::class,2)->create([
                    'post_id'=>$post->id,
                    'user_id'=>User::all()->random()->id
                ])->each(function($comment){
                    factory(App\Reply::class,4)->create([
                        'post_id'=> $comment->post_id,
                        'comment_id'=>$comment->id,
                        'user_id'=>User::all()->random()->id
                    ]);
                });

                factory(App\Comment::class,2)->create([
                    'post_id'=>$post->id,
                    'user_id'=>User::all()->random()->id
                ])->each(function($comment){
                    factory(App\Reply::class,4)->create([
                        'post_id'=> $comment->post_id,
                        'comment_id'=>$comment->id,
                        'user_id'=>User::all()->random()->id
                    ]);
                });
            });
        });
    }
}
