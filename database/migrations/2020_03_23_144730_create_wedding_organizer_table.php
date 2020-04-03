<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeddingorganizerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wedding_organizer', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');

            $table->string('nama_perusahaan');
            $table->string('alamat');
            $table->string('nomor_telepon');
            $table->string('instagram')->nullable();
            $table->string('tentang_perusahaan');
            $table->string('nama_bank');
            $table->string('nomor_rekening');
            $table->string('nama_pemilik');
            $table->string('rating');
            $table->string('foto_profil');
            $table->string('foto_ijin_usaha')->nullable();
            $table->timestamps();

            $table->foreign('user_id')
              ->references('id')->on('user')
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
        Schema::dropIfExists('wedding_organizer');
    }
}
