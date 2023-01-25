<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class AlbumFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $names = [
            'Alice',
            'Bob',
            'Charlie',
            'David',
            'Eve',
            'Frank',
            'Greta',
            'Henry',
            'Ida',
            'Jack',
            'Whitaker',
            'Ludwig',
            'Rachel',
            'Sydney',
            'Michael'
        ];

        $selectedNames = $this->faker->randomElements($names, 10);
        $contributors = implode(', ', $selectedNames);

        $numWords = $this->faker->numberBetween(1, 4);
        return [
            'artist_id' => $this->faker->numberBetween(1, 25),
            'album_type_id' => $this->faker->numberBetween(1, 3),
            'title' => $this->faker->words($numWords, true),
            'release_date' => $this->faker->date('Y-m-d', 'now'),
            'description' => $this->faker->paragraph,
            'contributors' => $contributors,
            'cover_image' => 'https://picsum.photos/400',
            'created_at' => Carbon::now()
        ];
    }
}
