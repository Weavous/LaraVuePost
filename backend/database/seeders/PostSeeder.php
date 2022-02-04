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
        Post::factory()->count(2)->user()->create()->map(function (Post $post) {
            Comment::factory()->count(2)->post($post)->comment(
                Comment::factory()->count(2)->post($post)->user()->create()->first()
            )->user()->create();
        });
    }
}
