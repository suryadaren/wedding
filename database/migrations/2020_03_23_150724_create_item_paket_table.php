<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemPaketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_paket', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('paket_wedding_organizer_id');
            $table->unsignedBigInteger('item_wedding_organizer_id');

            $table->string('harga_awal');
            $table->string('harga_akhir');
            $table->timestamps();

            $table->foreign('paket_wedding_organizer_id')
              ->references('id')->on('paket_wedding_organizer')
              ->onDelete('cascade');

            $table->foreign('item_wedding_organizer_id')
              ->references('id')->on('item_wedding_organizer')
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
        Schema::dropIfExists('item_paket');
    }
}
