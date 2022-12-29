<?php

namespace Database\Factories;

use App\Models\Genre;
use App\Models\Song;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class SongFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $numWords = $this->faker->numberBetween(1, 4);
        return [
            'album_id' => $this->faker->numberBetween(1, 40),
            'title' => $this->faker->words($numWords, true),
            'description' => $this->faker->paragraph,
            'lyrics' => $this->faker->paragraphs(10, true),
            'view_count' => $this->faker->numberBetween(30000, 9223372),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Song $song) {
            $genres = Genre::all();
            $selectedGenres = collect($this->faker->randomElements($genres, 3));
            $genreIds = $selectedGenres->pluck('id');
            $song->genres()->attach($genreIds);
        });
    }
}
