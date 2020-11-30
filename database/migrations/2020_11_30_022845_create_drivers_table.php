<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('id_driver'); // ini yang diisi manual btw
            $table->string('foto_driver');
            $table->string('no_ktp');
            $table->string('foto_ktp');
            $table->string('no_sim');
            $table->string('foto_sim');
            $table->string('tipe_armada');
            $table->string('no_polisi');
            $table->string('foto_armada');
            $table->string('no_rekening');
            $table->string('nama_bank');
            $table->string('nama_holder');
            $table->string('regional');
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
        Schema::dropIfExists('drivers');
    }
}
