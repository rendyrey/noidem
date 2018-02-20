<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Menu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_induk');
            $table->string('menu');
            $table->string('icon');
            $table->string('url');
            $table->integer('no_urut');
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
