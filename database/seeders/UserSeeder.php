<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'fullname' => 'Lyrics-Go Admin',
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('AdMin1013'),
            'role' => 2,
        ]);
    }
}
