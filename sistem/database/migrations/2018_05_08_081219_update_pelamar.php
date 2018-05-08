<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePelamar extends Migration
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
            $table->integer('status_invite')->default(0)->after('status_pelamar');
            $table->integer('status_checkin')->default(0)->after('status_invite');
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
        Schema::table('pelamar', function (Blueprint $table) {
            $table->dropColumn('status_invite');
            $table->dropColumn('status_checkin');
        });
    }
}
