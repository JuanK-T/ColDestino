<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'subtitle' => $this->faker->sentence(),
            'description' => $this->faker->text(1000)
        ];
    }
}
