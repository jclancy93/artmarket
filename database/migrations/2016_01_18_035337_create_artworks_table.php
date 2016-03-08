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
            $table->string('artist_firstname');
            $table->string('artist_lastname');
            $table->string('artist_fullname');
            $table->string('artwork');
            $table->string('category')->nullable();
            $table->string('year')->nullable();
            $table->string('medium')->nullable();
            $table->string('art_fair')->nullable();
            $table->date('art_fair_year');
            $table->string('gallery_name')->nullable();
            $table->string('dimensions')->nullable();
            $table->string('price')->nullable();
            $table->string('image')->nullable();
            $table->text('notes')->nullable();
            $table->text('citation')->nullable();
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
