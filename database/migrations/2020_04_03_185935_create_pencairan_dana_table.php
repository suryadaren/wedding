<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePencairanDanaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pencairan_dana', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('pemesanan_id');

            $table->string('nama_bank')->nullable();
            $table->string('nomor_rekening')->nullable();
            $table->string('nama_pemilik')->nullable();
            $table->string('jumlah')->nullable();
            $table->string('bukti_pembayaran')->nullable();
            $table->string('status');

            $table->timestamps();
            
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
        Schema::dropIfExists('pencairan_dana');
    }
}
