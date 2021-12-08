<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'biography' => $this->faker->paragraph(),
            'website' => $this->faker->url(),
            'facebook' => 'https://www.facebook.com/',
            'youtube' => 'https://www.youtube.com/',
        ];
    }
}
