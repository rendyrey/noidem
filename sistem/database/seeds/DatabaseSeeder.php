<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('iklan')->insert([
        //     'id_kategori' => '13',
        //     'id_media' => '13',
        //     'plan_start_date' => '2016-11-22',
        //     'plan_end_date' => '2016-12-22',
        //     'actual_start_date' => '2016-11-22',
        //     'actual_end_date' => '2016-12-22',
        //     'domain' => 'jobfair.medion.co.id',
        //     'event_code' => '789',
        // ]);

        DB::table('loker')->insert([
            'id_iklan' => '2', 
            'budget' => '100000',
            'cost' => '100000',
            'id_tingkat_pendidikan' => '1', 
            'id_major_grup' => '7', 
            'id_major' => '7', 
            'no_rcr' => 'RCR1100',
            'position_name' => 'Vaksinator',
            'target_fresh' => '5',
            'target_exp' => '5',                
            'actual_fresh' => '5', //calculate;
            'actual_exp' => '5', //calculate;
            'target_pg_fresh' => '5', //calculate;
            'actual_pg_fresh' => '5', //calculate;
            'target_pg_exp' => '5', //calculate;
            'actual_pg_exp' => '5', //calculate;
            'awaiting_fresh' => '5', //calculate;
            'awaiting_exp' => '5', //calculate;
            'target_pass_fresh' => '5', //calculate;
            'target_pass_exp' => '5', //calculate;
            'actual_pass_fresh' => '5', //calculate;
            'actual_pass_exp' => '5', //calculate;
            'index_adv_media_effect_fresh' => '5', //calculate;
            'index_adv_media_effect_exp' => '5',
        ]);

        for ($i=0; $i < ; $i++) { 
            # code...
        }
    }
}
