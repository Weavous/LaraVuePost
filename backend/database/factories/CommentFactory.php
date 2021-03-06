<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Str;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'text' => $this->faker->realText(128)
        ];
    }

    /**
     * Links the App\Model\User to comment.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function user(?User $user = NULL)
    {
        return $this->state(function (array $attributes) use ($user) {
            return [
                'user_id' => $user instanceof User ? $user->id : User::factory(1)->avatar()->create()->first()->id,
            ];
        });
    }

    /**
     * Links the App\Model\Post to comment.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function post(?Post $post = NULL)
    {
        return $this->state(function (array $attributes) use ($post) {
            return [
                'post_id' => $post instanceof Post ? $post->id : Post::factory()->count(1)->user()->create()->first()->id,
            ];
        });
    }

    /**
     * Links the App\Model\Comment to comment.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function comment(?Comment $comment = NULL)
    {
        return $this->state(function (array $attributes) use ($comment) {
            return [
                'comment_id' => $comment instanceof Comment ? $comment->id : Comment::factory()->count(1)->user()->post()->comment()
            ];
        });
    }
}
