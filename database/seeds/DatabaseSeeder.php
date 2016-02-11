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
            'artist' => 'Damien Hirst',
            'artwork' => 'Spin Painting',
            'price' => '1000000',
            'year' => '1965',
            'art_fair' => 'Art Basel Hong Kong',
            'art_fair_year' => 'April, 2014',
            'gallery_name' => 'Gagosian Gallery',
            'image' => NULL,
            'notes' => 'Price is asking price',
        ]);

        DB::table('artworks')->insert([
            'artist' => 'Damien Hirst',
            'artwork' => 'Spin Painting',
            'price' => '1000000',
            'year' => '1965',
            'art_fair' => 'Art Basel Hong Kong',
            'art_fair_year' => 'April, 2014',
            'gallery_name' => 'Gagosian Gallery',
            'image' => NULL,
            'notes' => 'Price is asking price',
        ]);

        DB::table('artworks')->insert([
            'artist' => 'Damien Hirst',
            'artwork' => 'Spin Painting',
            'price' => '1000000',
            'year' => '1965',
            'art_fair' => 'Art Basel Hong Kong',
            'art_fair_year' => 'April, 2014',
            'gallery_name' => 'Gagosian Gallery',
            'image' => NULL,
            'notes' => 'Price is asking price',
        ]);

        DB::table('artworks')->insert([
            'artist' => 'Damien Hirst',
            'artwork' => 'Spin Painting',
            'price' => '1000000',
            'year' => '1965',
            'art_fair' => 'Art Basel Hong Kong',
            'art_fair_year' => 'April, 2014',
            'gallery_name' => 'Gagosian Gallery',
            'image' => NULL,
            'notes' => 'Price is asking price',
        ]);

        DB::table('artworks')->insert([
            'artist' => 'Damien Hirst',
            'artwork' => 'Spin Painting',
            'price' => '1000000',
            'year' => '1965',
            'art_fair' => 'Art Basel Hong Kong',
            'art_fair_year' => 'April, 2014',
            'gallery_name' => 'Gagosian Gallery',
            'image' => NULL,
            'notes' => 'Price is asking price',
        ]);

        DB::table('artworks')->insert([
            'artist' => 'Damien Hirst',
            'artwork' => 'Spin Painting',
            'price' => '1000000',
            'year' => '1965',
            'art_fair' => 'Art Basel Hong Kong',
            'art_fair_year' => 'April, 2014',
            'gallery_name' => 'Gagosian Gallery',
            'image' => NULL,
            'notes' => 'Price is asking price',
        ]);
    }
}
