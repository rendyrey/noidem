<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTglPsychotest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('tanggal_psychotest', function (Blueprint $table) {
            $table->integer('kuota')->after('tanggal');
            $table->integer('kuota_left')->after('kuota');
            $table->integer('id_test_method')->after('kuota_left');
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
        Schema::table('tanggal_psychotest', function (Blueprint $table) {
            $table->dropColumn('kuota');
            $table->dropColumn('kuota_left');
            $table->dropColumn('id_test_method');
        });
    }
}
