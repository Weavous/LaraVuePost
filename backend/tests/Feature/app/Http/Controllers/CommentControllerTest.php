<?php

namespace Tests\Feature\app\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Str;
use Tests\TestCase;

class CommentControllerTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_it_should_store_a_comment_and_return_http_created_status_code()
    {
        $comment = Comment::factory()->count(1)->post()->user()->create()->first();
        $user = User::factory()->count(1)->avatar()->create()->first();

        $this->post('api/v1/comments', [
            'comment_id' => $comment->id,
            'user_id' => $user->id,
            'text' => Str::random(64)
        ])->assertStatus(Response::HTTP_CREATED)->assertJsonStructure([
            'text',
            'user_id',
            'comment_id',
            'post_id',
            'updated_at',
            'created_at',
            'id'
        ]);
    }
}
