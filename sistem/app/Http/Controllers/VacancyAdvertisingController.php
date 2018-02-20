<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Iklan;
use App\Loker;
use App\TingkatPendidikan;
use App\MajorGrup;
use App\Major;
use App\AdvertisingCategory;
use App\AdvertisingMedia;
use Carbon\Carbon;
use DB;
use Input;

class VacancyAdvertisingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
    	$iklan = Iklan::all();
    	$tingkat_pendidikan = TingkatPendidikan::all()->lists('tingkat', 'id');
    	$major_grup = MajorGrup::all()->lists('nama_grup','id');
    	$major = Major::all();
    	$advertising_category = AdvertisingCategory::all()->lists('kategori', 'id');
    	$advertising_media = AdvertisingMedia::all();
    	return view('admin.vacancy_advertising.index', compact('iklan','tingkat_pendidikan','major_grup','major','advertising_category','advertising_media'));  	
    }

    public function tambah_loker($id, Request $request)
    {
    	$loker = new Loker;
    	$loker->id_iklan = $id;
    	$loker->budget = $request->input('budget_'.$id);
    	$loker->cost = $request->input('cost_'.$id);
    	$loker->id_tingkat_pendidikan = $request->input('id_tingkat_pendidikan_'.$id);
    	$loker->id_major_grup = $request->input('id_major_grup_'.$id);
    	$loker->id_major = $request->input('id_major_'.$id);
    	$loker->no_rcr = $request->input('no_rcr_'.$id);
    	$loker->position_name = $request->input('posisi_'.$id);
        $loker->position_publish = $request->input('posisi_publish_'.$id);
    	$loker->target_fresh = $request->input('target_fresh_'.$id);
    	$loker->target_exp = $request->input('target_exp_'.$id);
    	$loker->actual_fresh = $request->input('actual_fresh_'.$id);
    	$loker->actual_exp = $request->input('actual_exp_'.$id);
    	$loker->target_pg_fresh = $request->input('target_pg_fresh_'.$id);
    	$loker->target_pg_exp = $request->input('target_pg_exp_'.$id);
    	$loker->actual_pg_fresh = $request->input('actual_pg_fresh_'.$id);
    	$loker->actual_pg_exp = $request->input('actual_pg_exp_'.$id);
    	$loker->awaiting_fresh = $request->input('awaiting_fresh_'.$id);
    	$loker->awaiting_exp = $request->input('awaiting_exp_'.$id);
    	$loker->target_pass_fresh = $request->input('target_pass_fresh_'.$id);
    	$loker->target_pass_exp = $request->input('target_pass_exp_'.$id);
    	$loker->actual_pass_fresh = $request->input('actual_pass_fresh_'.$id);
    	$loker->actual_pass_exp = $request->input('actual_pass_exp_'.$id);
    	$loker->index_adv_media_effect_fresh = $request->input('index_adv_media_effect_fresh_'.$id);
    	$loker->index_adv_media_effect_exp = $request->input('index_adv_media_effect_exp_'.$id);
        $loker->created_at = Carbon::now();
        $loker->updated_at = Carbon::now();
    	$loker->save();

    	return redirect('vacancy_advertising')->with('message', 'Data loker berhasil disimpan!');

    }

    public function tambah_iklan(Request $request)
    {
    	$iklan = new Iklan;
    	$iklan->event_code = $request->event_code;
    	$iklan->id_kategori = $request->id_kategori;
    	$iklan->id_media = $request->id_media;
    	$iklan->plan_start_date = $request->plan_start_date;
    	$iklan->plan_end_date = $request->plan_end_date;
    	$iklan->actual_start_date = $request->actual_start_date;
    	$iklan->actual_end_date = $request->actual_end_date;
    	$iklan->domain = $request->domain;
    	$iklan->save();

    	return redirect('vacancy_advertising')->with('message', 'Data loker berhasil disimpan!');
    }

    public function edit_iklan($id)
    {
        $iklan = Iklan::findOrfail($id);
        $advertising_category = AdvertisingCategory::all()->lists('kategori', 'id');
        $advertising_media = AdvertisingMedia::all();
		
		if ($iklan->plan_start_date == "0000-00-00") {

            $iklan->plan_start_date = "";

        } else {

            $iklan->plan_start_date = $iklan->plan_start_date;
        }

        if ($iklan->plan_end_date == "0000-00-00") {

            $iklan->plan_end_date = "";

        } else {

            $iklan->plan_end_date = $iklan->plan_end_date;
        }

        if ($iklan->actual_start_date == "0000-00-00") {

            $iklan->actual_start_date = "";

        } else {

            $iklan->actual_start_date = $iklan->actual_start_date;
        }

        if ($iklan->actual_end_date == "0000-00-00") {

            $iklan->actual_end_date = "";

        } else {

            $iklan->actual_end_date = $iklan->actual_end_date;
        }
        return view('admin.vacancy_advertising.edit_iklan', compact('iklan','advertising_category','advertising_media'));
    }

    public function update_iklan($id, Request $request)
    {
        $event_code = $request->event_code;
        $id_kategori = $request->id_kategori;
        $id_media = $request->id_media;
        $plan_start_date = $request->plan_start_date;
        $plan_end_date = $request->plan_end_date;
        $actual_start_date = $request->actual_start_date;
        $actual_end_date = $request->actual_end_date;
        $domain = $request->domain;

        DB::table('iklan')->where('id', $id)->update(['event_code' => $event_code, 'id_kategori' => $id_kategori, 'id_media' => $id_media, 'plan_start_date' => $plan_start_date, 'plan_end_date' => $plan_end_date, 'actual_start_date' => $actual_start_date, 'actual_end_date' => $actual_end_date, 'domain' => $domain, 'updated_at' => Carbon::now()]);

        return redirect('vacancy_advertising')->with('message', 'Data Iklan berhasil diubah!');
    }

    public function edit_loker($id)
    {
        $loker = Loker::findOrfail($id);
        $tingkat_pendidikan = TingkatPendidikan::all()->lists('tingkat', 'id');
        $major_grup = MajorGrup::all()->lists('nama_grup','id');
        $major = Major::all();
        $advertising_category = AdvertisingCategory::all()->lists('kategori', 'id');
        $advertising_media = AdvertisingMedia::all();
        return view('admin.vacancy_advertising.edit_loker', compact('loker','tingkat_pendidikan','major_grup','major','advertising_category','advertising_media'));
    }

    public function update_loker($id, Request $request)
    {
        $budget = $request->input('budget');
        $cost = $request->input('cost');
        $id_tingkat_pendidikan = $request->input('id_tingkat_pendidikan');
        $id_major_grup = $request->input('id_major_grup');
        $id_major = $request->input('id_major');
        $no_rcr = $request->input('no_rcr');
        $position_name = $request->input('posisi');
        $position_publish = $request->input('posisi_publish');
        $target_fresh = $request->input('target_fresh');
        $target_exp = $request->input('target_exp');
        $actual_fresh = $request->input('actual_fresh');
        $actual_exp = $request->input('actual_exp');
        $target_pg_fresh = $request->input('target_pg_fresh');
        $target_pg_exp = $request->input('target_pg_exp');
        $actual_pg_fresh = $request->input('actual_pg_fresh');
        $actual_pg_exp = $request->input('actual_pg_exp');
        $awaiting_fresh = $request->input('awaiting_fresh');
        $awaiting_exp = $request->input('awaiting_exp');
        $target_pass_fresh = $request->input('target_pass_fresh');
        $target_pass_exp = $request->input('target_pass_exp');
        $actual_pass_fresh = $request->input('actual_pass_fresh');
        $actual_pass_exp = $request->input('actual_pass_exp');
        $index_adv_media_effect_fresh = $request->input('index_adv_media_effect_fresh');
        $index_adv_media_effect_exp = $request->input('index_adv_media_effect_exp');

         DB::table('loker')->where('id', $id)->update(['budget' => $budget, 'cost' => $cost, 'id_tingkat_pendidikan' => $id_tingkat_pendidikan, 'id_major_grup' => $id_major_grup, 'id_major' => $id_major, 'no_rcr' => $no_rcr, 'position_name' => $position_name, 'position_publish' => $position_publish, 'target_fresh'=> $target_fresh, 'target_exp' => $target_exp, 'actual_fresh' => $actual_fresh, 'actual_exp' => $actual_exp, 'target_pg_fresh' => $target_pg_fresh, 'target_pg_exp' => $target_pg_exp, 'actual_pg_fresh' => $actual_pg_fresh, 'actual_pg_exp' => $actual_pg_exp, 'awaiting_fresh' => $awaiting_fresh, 'awaiting_exp' => $awaiting_exp, 'target_pass_fresh' => $target_pass_fresh, 'target_pass_exp' => $target_pass_exp, 'actual_pass_fresh' => $actual_pass_fresh, 'actual_pass_exp' => $actual_pass_exp, 'index_adv_media_effect_fresh' => $index_adv_media_effect_fresh, 'index_adv_media_effect_exp' => $index_adv_media_effect_exp, 'updated_at' => Carbon::now()]);

         return redirect('vacancy_advertising')->with('message', 'Data Iklan berhasil diubah!');
        
    }
}
