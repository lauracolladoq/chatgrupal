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
        //user id. imagen, contenido
        fake()->addProvider(new \Mmo\Faker\PicsumProvider(fake()));
        return [
            'user_id' => User::all()->random()->id,
            'imagen' => 'posts/' . fake()->picsum('public/storage/posts', 640, 480, false),
            'contenido' => fake()->text()
        ];
    }
}
