<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DetailEducationalWe extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_edu_bg', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_pelamar');
            $table->integer('id_tingkat_pendidikan_1');
            $table->integer('id_institusi_1');
            $table->string('other_institusi_1')->nullable();
            $table->integer('id_major_1');
            $table->string('other_major_1')->nullable();
            $table->string('gpa_1');
            $table->string('start_year_1');
            $table->string('end_year_1');
            $table->integer('id_tingkat_pendidikan_2')->nullable();
            $table->integer('id_institusi_2')->nullable();
            $table->string('other_institusi_2')->nullable();
            $table->integer('id_major_2')->nullable();
            $table->string('other_major_2')->nullable();
            $table->string('gpa_2')->nullable();
            $table->string('start_year_2')->nullable();
            $table->string('end_year_2')->nullable();
            $table->timestamps();
        });

        Schema::create('detail_we', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_pelamar')->nullable();
            $table->integer('id_bidang_usaha_1')->nullable();
            $table->string('other_bidang_usaha_1')->nullable();
            $table->string('start_year_1')->nullable();
            $table->string('end_year_1')->nullable();
            $table->integer('id_bidang_usaha_2')->nullable();
            $table->string('other_bidang_usaha_2')->nullable();
            $table->string('start_year_2')->nullable();
            $table->string('end_year_2')->nullable();
            $table->integer('id_bidang_usaha_3')->nullable();
            $table->string('other_bidang_usaha_3')->nullable();
            $table->string('start_year_3')->nullable();
            $table->string('end_year_3')->nullable();
            $table->integer('id_bidang_usaha_4')->nullable();
            $table->string('other_bidang_usaha_4')->nullable();
            $table->string('start_year_4')->nullable();
            $table->string('end_year_4')->nullable();
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
        Schema::dropIfExists('detail_edu_bg');
        Schema::dropIfExists('detail_we');
    }
}
