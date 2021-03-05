<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePtnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ptn', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->unique();
            $table->longText('deskripsi');
            $table->string('gambar')->nullable();
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
        // Schema::dropIfExists('ptn');
    }
}