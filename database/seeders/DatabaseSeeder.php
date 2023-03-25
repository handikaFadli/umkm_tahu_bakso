<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Kategori;
use App\Models\User;
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
        // \App\Models\User::factory(10)->create();

        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
        ]);

        Kategori::create([
            'nm_kategori' => 'Original'
        ]);
        Kategori::create([
            'nm_kategori' => 'Rawit'
        ]);
        Kategori::create([
            'nm_kategori' => 'Mix'
        ]);
    }
}
