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
        });
    }
}
