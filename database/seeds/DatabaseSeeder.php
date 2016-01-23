<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserTableSeeder::class);
        Model::unguard();

        DB::table('artworks')->insert([
            'artist' => 'Warhol',
            'artwork' => 'Warhol Paintin',
            'price' => '$100',
            'notes' => 'Warhol Paintin',
        ]);

        DB::table('artworks')->insert([
            'artist' => 'Manet',
            'artwork' => 'Manet Paintin',
            'price' => '$200',
            'notes' => 'Manet Paintin so good',
        ]);

        DB::table('artworks')->insert([
            'artist' => 'Warhol',
            'artwork' => 'Warhol Paintin',
            'price' => '$100',
            'notes' => 'Warhol Paintin',
        ]);

        DB::table('artworks')->insert([
            'artist' => 'Warhol',
            'artwork' => 'Warhol Paintin',
            'price' => '$100',
            'notes' => 'Warhol Paintin',
        ]);

        DB::table('artworks')->insert([
            'artist' => 'Warhol',
            'artwork' => 'Warhol Paintin',
            'price' => '$100',
            'notes' => 'Warhol Paintin',
        ]);
        DB::table('artworks')->insert([
            'artist' => 'Warhol',
            'artwork' => 'Warhol Paintin',
            'price' => '$100',
            'notes' => 'Warhol Paintin',
        ]);

        DB::table('artworks')->insert([
            'artist' => 'Warhol',
            'artwork' => 'Warhol Paintin',
            'price' => '$100',
            'notes' => 'Warhol Paintin',
        ]);

        DB::table('artworks')->insert([
            'artist' => 'Warhol',
            'artwork' => 'Warhol Paintin',
            'price' => '$100',
            'notes' => 'Warhol Paintin',
        ]);

        DB::table('artworks')->insert([
            'artist' => 'Warhol',
            'artwork' => 'Warhol Paintin',
            'price' => '$100',
            'notes' => 'Warhol Paintin',
        ]);

        DB::table('artworks')->insert([
            'artist' => 'Warhol',
            'artwork' => 'Warhol Paintin',
            'price' => '$100',
            'notes' => 'Warhol Paintin',
        ]);
        DB::table('artworks')->insert([
            'artist' => 'Warhol',
            'artwork' => 'Warhol Paintin',
            'price' => '$100',
            'notes' => 'Warhol Paintin',
        ]);

        DB::table('artworks')->insert([
            'artist' => 'Warhol',
            'artwork' => 'Warhol Paintin',
            'price' => '$100',
            'notes' => 'Warhol Paintin',
        ]);

        DB::table('artworks')->insert([
            'artist' => 'Warhol',
            'artwork' => 'Warhol Paintin',
            'price' => '$100',
            'notes' => 'Warhol Paintin',
        ]);

        DB::table('artworks')->insert([
            'artist' => 'Warhol',
            'artwork' => 'Warhol Paintin',
            'price' => '$100',
            'notes' => 'Warhol Paintin',
        ]);

        DB::table('artworks')->insert([
            'artist' => 'Warhol',
            'artwork' => 'Warhol Paintin',
            'price' => '$100',
            'notes' => 'Warhol Paintin',
        ]);
    }
}
