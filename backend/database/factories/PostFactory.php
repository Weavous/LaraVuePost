<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Str;

use App\Models\User;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->realText(32),
            'text' => $this->faker->realText(128)
        ];
    }


    /**
     * Links the App\Model\User to post.
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
}
