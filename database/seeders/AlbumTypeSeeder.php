<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlbumTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('album_types')->insert([
            ['name'=>'Single'], ['name'=>'LP'], ['name'=>'EP']
        ]);
    }
}
