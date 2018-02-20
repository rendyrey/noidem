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
        Schema::create('pelamar', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_applicant');
            $table->string('job_interest_1');
            $table->string('job_interest_2');
            $table->string('job_interest_3');
            $table->string('job_interest_4');
            $table->string('advertising_category');
            $table->string('medion_employee_name')->nullable();
            $table->string('nama');
            $table->string('jenis_kelamin');
            $table->string('status');
            $table->string('tgl_lahir');
            $table->string('email');
            $table->string('mobile_phone');
            $table->string('photo');
            $table->integer('id_tingkat_pendidikan')->unsigned();
            $table->integer('id_institusi')->unsigned();
            $table->string('other_institusi')->nullable();
            $table->integer('id_major')->unsigned();
            $table->string('other_major')->nullable();
            $table->double('gpa', 2, 2);
            $table->string('start_year_education');
            $table->string('end_year_education');
            $table->integer('id_bidang_usaha')->unsigned();
            $table->string('other_bidang_usaha')->nullable();
            $table->string('start_year_work_experience');
            $table->string('end_year_work_experience');
            $table->integer('id_tgl_psychotest')->unsigned();
            $table->integer('id_kota')->unsigned();
            $table->string('pernah_pkl_dimedion');
            $table->string('pernah_psychotest_dimedion');
            $table->date('tgl_psychotest_dimedion')->nullable();
            $table->timestamps();
        });

        Schema::table('pelamar', function($table) {
                $table->foreign('id_tingkat_pendidikan')->references('id')->on('tingkat_pendidikan')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('pelamar', function($table) {
                $table->foreign('id_institusi')->references('id')->on('institusi')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('pelamar', function($table) {
                $table->foreign('id_major')->references('id')->on('major')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('pelamar', function($table) {
                $table->foreign('id_bidang_usaha')->references('id')->on('bidang_usaha')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('pelamar', function($table) {
                $table->foreign('id_tgl_psychotest')->references('id')->on('tanggal_psychotest')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('pelamar', function($table) {
                $table->foreign('id_kota')->references('id')->on('kota')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pelamar');        
    }
}
