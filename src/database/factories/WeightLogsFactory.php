<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class WeightLogsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'weight' => $this->faker->randomFloat(1, 30, 150),
            'calories' => $this->faker->numberBetween(100, 1000),
            'exercise_time' => $this->faker->time('H:i:s'),
            'exercise_content' => $this->faker->sentence(),
        ];
    }
}
