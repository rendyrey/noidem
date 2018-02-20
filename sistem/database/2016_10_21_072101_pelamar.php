<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pelamar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('pelamar', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_pelamar');
            $table->string('nama_pelamar');
            $table->tinyInteger('jenis_kelamin');
            $table->tinyInteger('status_perkawinan');
            $table->integer('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->tinyInteger('tingkat_pendidikan');
            $table->integer('nama_institusi');
            $table->integer('kota_institusi');
            $table->integer('provinsi_institusi');
            $table->integer('bidang_studi');
            $table->integer('tahun_mulai');
            $table->integer('tahun_selesai');
            $table->text('keahlian');
            $table->text('alamat');
            $table->integer('kota');
            $table->integer('provinsi');
            $table->string('nomor_telepon');
            $table->tinyInteger('agama');
            $table->integer('media_iklan');
            $table->date('tanggal_efektif_undur_diri');
            $table->tinyInteger('status');
            $table->text('keterangan');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
