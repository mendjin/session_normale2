<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Motivation', function (Blueprint $table) {
            $table->increments('id');
            $table->string('intitule', 100);
            $table->unsignedInteger('id_abonne');
            $table->foreign('id_abonne')->references('id')->on('abonne')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Motivation');
    }
};
