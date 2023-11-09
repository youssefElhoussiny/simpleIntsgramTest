<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $images = ['female.gif' , 'male.jpg' , 'tourism 2.jpg'];
        return [
            'description'=>fake()->sentence(),
            'user_id'=>User::factory(),
            'image'=> 'posts/'. fake()->randomElement($images),
        ];
    }
}
