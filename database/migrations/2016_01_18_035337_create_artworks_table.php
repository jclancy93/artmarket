<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtworksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artworks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('artist');
            $table->string('artwork');
            $table->string('year');
            $table->string('medium')->nullable();
            $table->string('art_fair');
            $table->string('art_fair_year');
            $table->string('gallery_name');
            $table->string('price');
            $table->string('image')->nullable();
            $table->string('notes');
            $table->nullableTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('artworks');
    }
}
