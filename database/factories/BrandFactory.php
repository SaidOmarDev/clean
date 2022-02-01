<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'    => $this->faker->name(),
            'slogan'  => $this->faker->sentence(3),
            'logo'    => $this->faker->image(storage_path('app/public'), 70, 70, null, false),
            'user_id' => $this->faker->unique()->numberBetween(1, 15),
        ];
    }
}
