<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//         $this->call(UsersTableSeeder::class);
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

//         truncate removes the records in the database
        DB::table('users')->truncate();
        DB::table('posts')->truncate();
        DB::table('roles')->truncate();
        DB::table('categories')->truncate();
        DB::table('photos')->truncate();
        DB::table('comments')->truncate();
        DB::table('comment_replies')->truncate();

        factory(App\User::class, 10)->create()->each(function($user){

            $user->posts()->save(factory(App\Post::class)->make());

        });

        factory(App\Role::class, 3)->create();
        factory(App\Category::class, 5)->create();
        factory(App\Photo::class, 1)->create();

        factory(App\Comment::class, 10)->create()->each(function($comment){

            $comment->replies()->save(factory(App\CommentReply::class)->make());

        });

    }
}
