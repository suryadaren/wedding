<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaketWeddingorganizerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paket_wedding_organizer', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('wedding_organizer_id');

            $table->string('nama_paket');
            $table->string('deskripsi');
            $table->string('harga');
            $table->string('foto');
            $table->timestamps();

            $table->foreign('wedding_organizer_id')
              ->references('id')->on('wedding_organizer')
              ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paket_wedding_organizer');
    }
}
