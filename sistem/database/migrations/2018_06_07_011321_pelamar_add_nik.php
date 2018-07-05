<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PelamarAddNik extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('pelamar', function (Blueprint $table) {
            $table->string('nik')->after('medion_employee_name');
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
        Schema::table('pelamar',function(Blueprint $table){
            $table->dropColumn('nik');
        });
    }
}
