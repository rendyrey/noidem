<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Formlmaran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bidang_usaha', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bidang_usaha');
            $table->timestamps();
            
        });

        Schema::create('provinsi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('province');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('kota', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_provinsi')->unsigned();
            $table->string('kota');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('institusi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_provinsi')->unsigned();
            $table->integer('id_kota')->unsigned();
            $table->string('nama_institusi');
            $table->string('singkatan');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('major_grup', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode');
            $table->string('nama_grup');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('major', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_grup')->unsigned();
            $table->string('major');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('kota', function($table) {
            $table->foreign('id_provinsi')->references('id')->on('provinsi')->onDelete('cascade');
        });
        
        Schema::table('institusi', function($table) {
            $table->foreign('id_provinsi')->references('id')->on('provinsi')->onDelete('cascade');
            $table->foreign('id_kota')->references('id')->on('kota')->onDelete('cascade');
        });

        Schema::table('major', function($table) {
            $table->foreign('id_grup')->references('id')->on('major_grup')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bidang_usaha');
        Schema::dropIfExists('provinsi');
        Schema::dropIfExists('kota');
        Schema::dropIfExists('institusi');
        Schema::dropIfExists('major_grup');
        Schema::dropIfExists('major');
    }
}
