<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SyaratPrescreening extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('syarat_prescreening', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->string('position_category');
            $table->string('work_experience');
            $table->integer('edu_level');
            $table->string('accreditation');
            $table->double('gpa', 3, 2);
            $table->double('study_period',3,1);
            $table->integer('age');
            $table->integer('id_major')->nullable();
            $table->string('is_active')->nullable();
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
        Schema::drop('syarat_prescreening');
    }
}
