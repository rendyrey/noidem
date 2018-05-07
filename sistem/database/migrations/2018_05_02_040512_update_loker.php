<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateLoker extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('loker', function (Blueprint $table) {
            $table->integer('actual_applicant_fresh')->after('position_publish')->default(0);
            $table->integer('actual_applicant_exp')->after('actual_applicant_fresh')->default(0);
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
       Schema::table('loker', function (Blueprint $table) {
           $table->dropColumn('actual_applicant_fresh');
           $table->dropColumn('actual_applicant_exp');
       });
    }
}
