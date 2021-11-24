<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Info users
        $users = User::factory()->count(20)->create();

        //Insert Appointment
        $appointments = Appointment::factory()->count(50)->make()
        ->each(function($appointment) use ($users) {
        $appointment->user_id = $users->random()->id;
        $appointment->save();
    });

        //Insert billed
        $billeds = Billed::factory()->count(50)->make()
        ->each(function($billed) use ($users) {
        $billed->user_id = $users->random()->id;
        $billed->save();
    });

         //Insert posts
         $posts = Post::factory()->count(50)->make()
         ->each(function($post) use ($users) {
         $post->user_id = $users->random()->id;
         $post->save();
    });
         //Insert comments
        $comments = Comment::factory()->count(60)->make()
        ->each(function($comment) use ($users, $posts) {
        $comment->user_id = $users->random()->id;
        $comment->post_id = $posts->random()->id;
        $comment->save();
    });
         //Insert likes
        $likes = Like::factory()->count(50)->make()
        ->each(function($like) use ($users, $posts) {
        $like->user_id = $users->random()->id;
        $like->post_id = $posts->random()->id;
        $like->save();

         });
    }
}
