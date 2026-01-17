<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class WeightLogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $start = '2025-01-01';
        $end   = '2025-12-31';

        return [
            'date' => $this->faker->dateTimeBetween($start,$end),
            'weight' => $this->faker->randomFloat(1,40,70),
            'calories' => $this->faker->numberBetween(0,3000),
            'exercise_time' => $this->faker->time('H:i:s'),
            'exercise_content' => $this->faker->realText(120),
        ];
    }
}
