<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('review', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('pemesanan_id');
            $table->unsignedBigInteger('wedding_organizer_id')->nullable();

            $table->string('bintang');
            $table->string('komentar');

            $table->timestamps();

            $table->foreign('customer_id')
              ->references('id')->on('customer')
              ->onDelete('cascade');

            $table->foreign('pemesanan_id')
              ->references('id')->on('pemesanan')
              ->onDelete('cascade');


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
        Schema::dropIfExists('review');
    }
}
