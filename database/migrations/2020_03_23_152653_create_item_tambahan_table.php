<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemTambahanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_tambahan', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('item_wedding_organizer_id');
            $table->unsignedBigInteger('pemesanan_id');

            $table->string('harga_awal');
            $table->string('harga_akhir');

            $table->timestamps();

            $table->foreign('item_wedding_organizer_id')
              ->references('id')->on('item_wedding_organizer')
              ->onDelete('cascade');

            $table->foreign('pemesanan_id')
              ->references('id')->on('pemesanan')
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
        Schema::dropIfExists('item_tambahan');
    }
}
