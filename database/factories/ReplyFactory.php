<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReplyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'reply' => $this->faker->text(),
            'value' => $this->faker->randomElement([1, 2]),
            'user_id' => User::all()->random()->id
        ];
    }
}
