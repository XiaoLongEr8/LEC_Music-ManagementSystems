<?php

namespace Database\Seeders;

use App\Models\Artist;
use App\Models\Album;
use App\Models\Genre;
use App\Models\Song;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AlbumTypeSeeder::class,
            UserSeeder::class
        ]);

        Artist::factory(25)->create();
        Genre::factory(15)->create();
        Album::factory(40)->create();
        Song::factory(100)->create();
    }
}
