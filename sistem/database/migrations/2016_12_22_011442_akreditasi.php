<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Akreditasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('akreditasi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_institusi');
            $table->integer('id_major');
            $table->string('akreditasi')->nullable();
            $table->integer('id_tingkat_pendidikan');
            $table->date('tgl_kadaluarsa')->nullable();
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
        Schema::dropIfExists('akreditasi');
    }
}
