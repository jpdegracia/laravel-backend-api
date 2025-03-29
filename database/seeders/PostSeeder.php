<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ensure there are users in the database
        if (User::count() === 0) {
            User::factory(5)->create(); // Create 5 users if none exist
        }

        // Get all users
        $users = User::all();

        // Create 20 sample posts, each assigned to a random user
        Post::factory(20)->make()->each(function ($post) use ($users) {
            $post->user_id = $users->random()->id;
            $post->save();
        });
    }
}
