<?php

namespace Tests\Feature\app\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class ReplyControllerTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_it_should_reply_a_comment()
    {
        $post = Post::factory()->count(1)->user()->create()->first();

        $comment = Comment::factory()->count(1)->post(
            $post
        )->user()->create()->first();

        $factory = Comment::factory()->count(1)->post($post)->make()->first()->toArray();

        $this->postJson('api/v1/comments', [
            'post_id' => $comment->post_id,
            'comment_id' => $comment->getKey(),
            'user_id' => $post->user_id,
            ...$factory
        ])->assertStatus(Response::HTTP_CREATED);
    }
}
