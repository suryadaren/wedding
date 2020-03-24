<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');

            
            $table->string('nama_lengkap');
            $table->string('jenis_kelamin');
            $table->string('alamat');
            $table->string('nomor_telepon');
            $table->string('foto_profil');
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
        Schema::dropIfExists('customer');
    }
}
