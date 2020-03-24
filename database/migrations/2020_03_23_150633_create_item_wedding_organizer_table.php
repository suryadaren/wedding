<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemWeddingorganizerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_wedding_organizer', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('wedding_organizer_id');

            $table->string('nama_item');
            $table->string('deskripsi');
            $table->string('harga');
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
        Schema::dropIfExists('item_wedding_organizer');
    }
}
