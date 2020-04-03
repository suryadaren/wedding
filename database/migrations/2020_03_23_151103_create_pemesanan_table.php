<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('paket_wedding_organizer_id');
            $table->unsignedBigInteger('wedding_organizer_id');

            $table->string('tanggal');
            $table->string('harga');
            $table->string('alamat')->nullable();
            $table->string('nama_pengantin_pria')->nullable();
            $table->string('nama_pengantin_wanita')->nullable();
            $table->string('tanggal_meeting')->nullable();
            $table->string('status');

            $table->timestamps();

            $table->foreign('customer_id')
              ->references('id')->on('customer')
              ->onDelete('cascade');

            $table->foreign('wedding_organizer_id')
              ->references('id')->on('wedding_organizer')
              ->onDelete('cascade');

            $table->foreign('paket_wedding_organizer_id')
              ->references('id')->on('paket_wedding_organizer')
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
        Schema::dropIfExists('pemesanan');
    }
}
