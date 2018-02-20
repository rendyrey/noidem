<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FormLamaran2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertising_category', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kategori');
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));           
            $table->softDeletes();
        });

        Schema::create('advertising_media', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_kategori')->unsigned();
            $table->string('media');
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));           
            $table->softDeletes();
        });

        Schema::create('tingkat_pendidikan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tingkat');
            $table->integer('no_urut');
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));           
            $table->softDeletes();
        });

        Schema::create('event_vacancy', function($table) {
            $table->increments('id');
            $table->string('event_code');
            $table->integer('id_media')->unsigned();
            $table->date('plan_start_date')->nullable();
            $table->date('plan_end_date')->nullable();
            $table->date('actual_start_date')->nullable();
            $table->date('actual_end_date')->nullable();
            $table->decimal('budget', 12, 2)->default(0);
            $table->decimal('cost', 12, 2)->default(0);                
            $table->integer('target_fresh')->default(0);
            $table->integer('target_exp')->default(0);                
            $table->integer('actual_fresh')->default(0); //calculate;
            $table->integer('actual_exp')->default(0); //calculate;                
            $table->integer('target_fresh_call')->default(0);
            $table->integer('target_exp_call')->default(0);                
            $table->integer('actual_fresh_call')->default(0); //calculate;
            $table->integer('actual_exp_call')->default(0); //calculate;                
            $table->integer('awaiting_fresh')->default(0); //calculate;
            $table->integer('awaiting_exp')->default(0); //calculate;                
            $table->integer('target_fresh_pass')->default(0);
            $table->integer('target_exp_pass')->default(0);                
            $table->integer('actual_fresh_pass')->default(0); //calculate;
            $table->integer('actual_exp_pass')->default(0); //calculate;                
            $table->integer('index_adv_media_effect_fresh')->default(0); //calculate
            $table->integer('index_adv_media_effect_exp')->default(0); //calculate                
            $table->integer('is_active')->default(1);
            $table->string('domain');
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            });

        Schema::table('advertising_media', function($table) {
                $table->foreign('id_kategori')->references('id')->on('advertising_category')->onDelete('cascade')->onUpdate('cascade');
            });

        Schema::table('event_vacancy', function($table) {
                $table->foreign('id_media')->references('id')->on('advertising_media')->onDelete('cascade')->onUpdate('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('advertising_category');
        Schema::dropIfExists('advertising_media');
        Schema::dropIfExists('tingkat_pendidikan');
        Schema::dropIfExists('event_vacancy');
    }
}
