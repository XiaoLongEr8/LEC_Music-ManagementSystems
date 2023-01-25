<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ArtistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        if (rand(0, 1)) {
            $name = $this->faker->unique()->name;
        } else {
            $name = $this->faker->unique()->words(2, true);
        }
        return [
            'fullname' => $name,
            'profile_pic' => 'https://picsum.photos/400',
            'bio' => $this->faker->paragraph,
            'nationality' => $this->faker->country
        ];
    }
}
