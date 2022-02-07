<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Comment;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::factory()->count(4)->user()->create()->map(function (Post $post) {
            Comment::factory()->count(1)->post($post)->user()->create()->map(function (Comment $comment) use ($post) {
                Comment::factory()->count(4)->post($post)->comment($comment)->user()->create();
            });
        });
    }
}
