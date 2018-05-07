<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateSyarat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::rename('syarat','syarat_psychotest');
        Schema::table('syarat_psychotest', function (Blueprint $table) {
           
            $table->dropColumn('gpa');
            $table->dropColumn('akreditasi');
            $table->dropColumn('masa_studi');
            $table->dropColumn('usia');
            $table->dropColumn('keterangan');
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
        });

        Schema::table('syarat_psychotest', function (Blueprint $table) {
            $table->string('type');
            $table->string('position_category');
            $table->string('test_type');
            $table->integer('test_score');
            $table->string('position')->nullable();
            $table->string('major')->nullable();
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
        //
        Schema::rename('syarat_psychotest','syarat');
        Schema::table('syarat', function (Blueprint $table) {
            $table->dropColumn('type');
            $table->dropColumn('position_category');
            $table->dropColumn('test_type');
            $table->dropColumn('test_score');
            $table->dropColumn('position');
            $table->dropColumn('major');
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
        });

        Schema::table('syarat', function (Blueprint $table) {
            $table->double('gpa', 2, 2);
            $table->string('akreditasi');
            $table->integer('masa_studi');
            $table->integer('usia');
            $table->timestamps();
        });
    }
}
