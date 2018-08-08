<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Imdb extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imdb', function (Blueprint $table) {
            $table->increments('id');
            $table->string('actors')->nullable();
            $table->string('budget')->nullable();
            $table->string('country')->nullable();
            $table->string('director')->nullable();
            $table->string('genre')->nullable();
            $table->string('gross')->nullable();
            $table->string('imdb_id');
            $table->string('language')->nullable();
            $table->string('metascore')->nullable();
            $table->string('opening_weekend')->nullable();
            $table->text('plot')->nullable();
            $table->text('poster')->nullable();
            $table->string('production')->nullable();
            $table->string('rated')->nullable();
            $table->string('rating')->nullable();
            $table->string('released')->nullable();
            $table->string('runtime')->nullable();
            $table->string('status')->nullable();
            $table->string('title')->nullable();
            $table->string('type')->nullable();
            $table->string('votes')->nullable();
            $table->string('writers')->nullable();
            $table->string('year')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imdb');
    }
}
