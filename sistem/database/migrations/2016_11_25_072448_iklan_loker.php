<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class IklanLoker extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iklan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_kategori');
            $table->integer('id_media');
            $table->date('plan_start_date');
            $table->date('plan_end_date');
            $table->date('actual_start_date')->nullable();
            $table->date('actual_end_date')->nullable();
            $table->string('domain');
            $table->string('event_code')->nullable();
            $table->timestamps();
        });

        Schema::create('loker', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_iklan');
            $table->decimal('budget', 12, 2)->default(0);
            $table->decimal('cost', 12, 2)->default(0);
            $table->integer('id_tingkat_pendidikan'); 
            $table->integer('id_major_grup'); 
            $table->integer('id_major'); 
            $table->string('no_rcr');
            $table->string('position_name');
            $table->string('position_publish');
            $table->integer('target_fresh')->default(0);
            $table->integer('target_exp')->default(0);                
            $table->integer('actual_fresh')->default(0); //calculate;
            $table->integer('actual_exp')->default(0); //calculate;
            $table->integer('target_pg_fresh')->default(0); //calculate;
            $table->integer('actual_pg_fresh')->default(0); //calculate;
            $table->integer('target_pg_exp')->default(0); //calculate;
            $table->integer('actual_pg_exp')->default(0); //calculate;
            $table->integer('awaiting_fresh')->default(0); //calculate;
            $table->integer('awaiting_exp')->default(0); //calculate;
            $table->integer('target_pass_fresh')->default(0); //calculate;
            $table->integer('target_pass_exp')->default(0); //calculate;
            $table->integer('actual_pass_fresh')->default(0); //calculate;
            $table->integer('actual_pass_exp')->default(0); //calculate;
            $table->double('index_adv_media_effect_fresh', 8,2)->default(0); //calculate;
            $table->double('index_adv_media_effect_exp', 8,2)->default(0); //calculate;
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
        Schema::dropIfExists('iklan');
        Schema::dropIfExists('loker');
    }
}
