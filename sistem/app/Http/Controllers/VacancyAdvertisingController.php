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
use App\Posisi;
use App\SyaratPsychotest;
use App\Pelamar;
use App\DetailEducation;
use App\DetailWorkExperience;
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
    $iklan_inprocess = Iklan::where('actual_end_date','0000-00-00')->get();
    $tingkat_pendidikan = TingkatPendidikan::all()->lists('tingkat', 'id');
    $major_grup = MajorGrup::all()->lists('nama_grup','id');
    $major = Major::all();
    $advertising_category = AdvertisingCategory::all()->lists('kategori', 'id');
    $advertising_media = AdvertisingMedia::all();
    $kriteria_syarat_opt = SyaratPsychotest::all();
    $iklan_done = Iklan::where('actual_end_date','<>','0000-00-00')->get();
    return view('admin.vacancy_advertising.index', compact('iklan_inprocess','iklan_done','tingkat_pendidikan','major_grup','major','advertising_category','advertising_media','kriteria_syarat_opt'));
  }

  public function filter(Request $request){
    $filter_vacancy = $request->filter_vacancy;
    if($filter_vacancy=="aktif"){
      $iklan = Iklan::where('actual_start_date','<>','0000-00-00')->where('actual_end_date','<>','0000-00-00')->get();
      // $iklan = Iklan::where('actual_start_date','0000-00-00')->orWhere('actual_end_date','0000-00-00')->get();
    }else if($filter_vacancy=="tidak_aktif"){
      $iklan = Iklan::where('actual_start_date','0000-00-00')->orWhere('actual_end_date','0000-00-00')->get();
    }else{
      $iklan = Iklan::all();
    }
    $tingkat_pendidikan = TingkatPendidikan::all()->lists('tingkat', 'id');
    $major_grup = MajorGrup::all()->lists('nama_grup','id');
    $major = Major::all();
    $advertising_category = AdvertisingCategory::all()->lists('kategori', 'id');
    $advertising_media = AdvertisingMedia::all();
    $kriteria_syarat_opt = KriteriaSyarat::all();
    return view('admin.vacancy_advertising.filter_vacancy', compact('iklan','tingkat_pendidikan','major_grup','major','advertising_category','advertising_media','kriteria_syarat_opt'));
  }

  public function tambah_loker($id, Request $request)
  {
    $this->validate($request,[
      "budget_$id"=>'required',
      "cost_$id"=>'required',
      "posisi_$id"=>'required',
      "posisi_publish_$id"=>'required',
      "target_fresh_$id"=>'required',
      "target_exp_$id"=>'required',
      "target_pg_fresh_$id" =>'required',
      "target_pg_exp_$id"=>'required',
      "id_major_grup_$id"=>'required',
      "id_major_$id"=>'required'
    ],[
      "budget_$id.required" => "Kolom Budget harus diisi!",
      "cost_$id.required" => "Kolom Cost harus diisi!",
      "posisi_$id.required" => "Kolom Posisi harus diisi!",
      "posisi_publish_$id.required" => "Kolom Posisi Publish harus diisi!",
      "target_fresh_$id.required" => "Kolom Target Fresh harus diisi!",
      "target_exp_$id.required" => "Kolom Target Exp harus diisi!",
      "target_pg_fresh_$id.required"=>"Kolom Target Pg Fresh harus diisi!",
      "target_pg_exp_$id.required"=>"Kolom Target Pg Exp harus diisi!",
      "id_major_grup_$id.required"=>"Kolom Major Group harus diisi!",
      "id_major_$id.required"=>"Kolom Major harus diisi!"
    ]
  );

  //atau bisa gini
  // $validator = Validator::make($request,$rules,$message)
  $loker = new Loker;
  $loker->id_iklan = $id;
  $cost = str_replace('.','',$request->input('budget_'.$id));
  $budget = str_replace('.','',$request->input('cost_'.$id));
  $loker->budget = $budget;
  $loker->cost = $cost;
  $loker->id_tingkat_pendidikan = $request->input('id_tingkat_pendidikan_'.$id);
  $loker->id_major_grup = $request->input('id_major_grup_'.$id);
  $loker->id_major = $request->input('id_major_'.$id,0);
  $loker->id_syarat = $request->input('id_syarat_'.$id);
  $loker->no_rcr = $request->input('no_rcr_'.$id);
  $loker->position_name = $request->input('posisi_'.$id);
  $loker->position_publish = $request->input('posisi_publish_'.$id);
  $loker->target_fresh = $request->input('target_fresh_'.$id);
  $loker->target_exp = $request->input('target_exp_'.$id);
  $loker->actual_fresh = $request->input('actual_fresh_'.$id,0);
  $loker->actual_exp = $request->input('actual_exp_'.$id,0);
  $loker->target_pg_fresh = $request->input('target_pg_fresh_'.$id);
  $loker->target_pg_exp = $request->input('target_pg_exp_'.$id);
  $loker->actual_pg_fresh = $request->input('actual_pg_fresh_'.$id,0);
  $loker->actual_pg_exp = $request->input('actual_pg_exp_'.$id,0);
  $loker->awaiting_fresh = $request->input('awaiting_fresh_'.$id,0);
  $loker->awaiting_exp = $request->input('awaiting_exp_'.$id,0);
  $loker->target_pass_fresh = $request->input('target_pass_fresh_'.$id);
  $loker->target_pass_exp = $request->input('target_pass_exp_'.$id);
  $loker->actual_pass_fresh = $request->input('actual_pass_fresh_'.$id,0);
  $loker->actual_pass_exp = $request->input('actual_pass_exp_'.$id,0);
  $loker->index_adv_media_effect_fresh = $request->input('index_adv_media_effect_fresh_'.$id);
  $loker->index_adv_media_effect_exp = $request->input('index_adv_media_effect_exp_'.$id);
  $loker->created_at = Carbon::now();
  $loker->updated_at = Carbon::now();
  $loker->save();

  return redirect('vacancy_advertising')->with('message', 'Data loker berhasil disimpan!')->with('panel','success');

}

public function tambah_iklan(Request $request)
{
  $iklan = new Iklan;
  $this->validate($request,[
    'event_code'=>'digits:3',
    'plan_start_date'=>'required|date|after:yesterday',
    'id_kategori'=>'required',
    'id_media'=>'required',
    'plan_end_date'=>'required|date|after:plan_start_date'
  ],[
    'id_kategori.required'=>'Adv Category harus diisi!',
    'id_media.required'=>'Adv Media harus diisi!',
    'event_code.digits'=>'Event code harus 3',
    'plan_start_date.required'=>'Plan Start Date harus diisi!',
    'plan_start_date.after'=>'Plan Start Date harus lebih atau sama dengan hari ini!',
    'plan_end_date.required'=>'Plan End Date harus diisi!',
    'plan_end_date.after'=>'Plan End Date harus lebih dari Plan Start Date!'
  ]);
  $iklan->event_code = $request->event_code;
  $iklan->id_kategori = $request->id_kategori;
  $iklan->id_media = $request->id_media;
  $iklan->plan_start_date = $request->plan_start_date;
  $iklan->plan_end_date = $request->plan_end_date;
  $iklan->actual_start_date = $request->input('actual_start_date',0);
  $iklan->actual_end_date = $request->input('actual_end_date',0);
  $iklan->domain = $request->domain;
  $iklan->save();

  return redirect('vacancy_advertising')->with('message', 'Data iklan berhasil disimpan!')->with('panel','success');
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
  $this->validate($request,[
    'event_code'=>'digits:3',
    'id_kategori'=>'required',
    'id_media'=>'required',
    'plan_start_date'=>'required|date',
    'plan_end_date'=>'required|date|after:plan_start_date',
    'actual_start_date'=>'required|date',
    'actual_end_date'=>'required|date|after:actual_start_date'
  ],[
    'id_kategori.required'=>'Adv Category harus diisi!',
    'id_media.required'=>'Adv Media harus diisi!',
    'plan_start_date.required'=>'Kolom Plan Start Date harus diisi!',
    'plan_end_date.required'=>'Kolom Plan End Date harus diisi!',
    'plan_end_date.date'=>'Kolom Plan End Date harus diisi dengan format tanggal!',
    'plan_end_date.after'=>'Kolom Plan End Date harus tanggal setelah Plan Start Date!',
    'actual_start_date.required'=>'Kolom Actual Start Date harus diisi!',
    'actual_start_date.date'=>'Kolom Actual Start Date harus diisi dengan format tanggal!',
    'actual_end_date.required'=>'Kolom Actual End Date harus diisi!',
    'actual_end_date.after'=>'Kolom Actual End Date harus tanggal setelah Actual Start Date!'
  ]);

  $event_code = $request->event_code;
  $id_kategori = $request->id_kategori;
  $id_media = $request->id_media;
  $plan_start_date = $request->plan_start_date;
  $plan_end_date = $request->plan_end_date;
  $actual_start_date = $request->actual_start_date;
  $actual_end_date = $request->actual_end_date;
  $domain = $request->domain;

  DB::table('iklan')->where('id', $id)->update(['event_code' => $event_code, 'id_kategori' => $id_kategori, 'id_media' => $id_media, 'plan_start_date' => $plan_start_date, 'plan_end_date' => $plan_end_date, 'actual_start_date' => $actual_start_date, 'actual_end_date' => $actual_end_date, 'domain' => $domain, 'updated_at' => Carbon::now()]);

  return redirect('vacancy_advertising')->with('message', 'Data Iklan berhasil diubah!')->with('panel','success');
}

public function edit_loker($id)
{
  $loker = Loker::findOrfail($id);
  $tingkat_pendidikan = TingkatPendidikan::all()->lists('tingkat', 'id');
  $major_grup = MajorGrup::all()->lists('nama_grup','id');
  $major = Major::all();
  $advertising_category = AdvertisingCategory::all()->lists('kategori', 'id');
  $advertising_media = AdvertisingMedia::all();
  $kriteria_syarat = KriteriaSyarat::all();
  return view('admin.vacancy_advertising.edit_loker', compact('loker','tingkat_pendidikan','major_grup','major','advertising_category','advertising_media','kriteria_syarat'));
}

public function update_loker($id, Request $request)
{

  $budget = $request->input('budget');
  $cost = $request->input('cost');
  $id_tingkat_pendidikan = $request->input('id_tingkat_pendidikan');
  $id_major_grup = $request->input('id_major_grup');
  $id_major = $request->input('id_major');
  $id_syarat = $request->input('id_syarat');
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

  return redirect("vacancy_advertising/$request->id_iklan/detail_iklan")->with('message', 'Data Loker berhasil diubah!')->with('panel','success');

}

public function delete_loker($id,$id_iklan){
  $hapus = Loker::findOrfail($id);
  $hapus->delete();
  return redirect("vacancy_advertising/$id_iklan/detail_iklan")->with('message', 'Data berhasil dihapus!')->with('panel','success');
}

public function detail_iklan($id){
  // $id = $request->id;
  $data['lokers'] = Loker::where('id_iklan',$id)->get();
  $data['iklan'] = Iklan::where('id',$id)->first();
  // echo "hi";
  return view('admin.vacancy_advertising.detail_iklan',$data);
}

public function form_tambah_loker($id){
  $data['lokers'] = Iklan::where('id',$id)->first();
  $data['kriteria_syarat_opt'] = SyaratPsychotest::all();
  $data['tingkat_pendidikan'] = TingkatPendidikan::all()->lists('tingkat', 'id');
  $data['major_grup'] = MajorGrup::all()->lists('nama_grup','id');
  $data['major'] = Major::all();
  $data['advertising_category'] = AdvertisingCategory::all()->lists('kategori', 'id');
  $data['advertising_media'] = AdvertisingMedia::all();
  $data['posisi'] = Posisi::orderBy('posisi','asc')->lists('posisi','id');
  $data['posisi_publish'] = Posisi::orderBy('posisi_publish','asc')->lists('posisi_publish','id');
  return view('admin.vacancy_advertising.tambah_loker',$data);
}

public function get_posisi_publish(Request $request){
  $posisi = Posisi::where('posisi',$request->nama_posisi)->first();
  echo "<option value='$posisi->posisi_publish'>$posisi->posisi_publish</option>";
}

public function detail_pelamar($id_iklan){
  $data['pelamar'] = Pelamar::where('id_iklan',$id_iklan)->get();
  $data['iklan'] = Iklan::find($id_iklan);

  return view('admin.vacancy_advertising.detail_pelamar',$data);
}

public function personal_detail($id){
  $pelamar = Pelamar::where('id', $id)->first();
  $detail_edu = DetailEducation::where('id_pelamar', $id)->first();
  $detail_we = DetailWorkExperience::where('id_pelamar', $id)->get();
  $loker1 = "";
  $loker2 = "";
  $loker3 = "";
  $loker4 = "";


  $edu_level1 = $pelamar->tingkat_pendidikan->tingkat;
  $loker1 = Loker::where('no_rcr', $pelamar->job_interest_1)->value('position_name');
  $loker2 = Loker::where('no_rcr', $pelamar->job_interest_2)->value('position_name');
  $loker3 = Loker::where('no_rcr', $pelamar->job_interest_3)->value('position_name');
  $loker4 = Loker::where('no_rcr', $pelamar->job_interest_4)->value('position_name');


  $edu_level2 = $detail_edu->tingkat_pendidikan1->tingkat;

  if($edu_level1 == $edu_level2) {
    $ket = "hidden";
  } else {
    $ket = "";
  }

  $we1 = "hidden";
  $we2 = "hidden";
  $we3 = "hidden";
  $we4 = "hidden";
  $id_bidang_usaha_1 = "";
  $other_bidang_usaha_1 = "";
  $start_year_1 = "";
  $end_year_1 = "";
  $id_bidang_usaha_2 = "";
  $other_bidang_usaha_2 = "";
  $start_year_2 = "";
  $end_year_2 = "";
  $id_bidang_usaha_3 = "";
  $other_bidang_usaha_3 = "";
  $start_year_3 = "";
  $end_year_3 = "";
  $id_bidang_usaha_4 = "";
  $other_bidang_usaha_4 = "";
  $start_year_4 = "";
  $end_year_4 = "";

  foreach ($detail_we as $value) {

    if (!empty($value->id_bidang_usaha_1)) {

      $we1 = "";
      $id_bidang_usaha_1 = $value->bidang_usaha1->bidang_usaha;
      $other_bidang_usaha_1 = $value->other_bidang_usaha_1;
      $start_year_1 = $value->start_year_1;
      $end_year_1 = $value->end_year_1;

    } else {

      $we1 = "hidden";
      $id_bidang_usaha_1 = "";
      $other_bidang_usaha_1 = "";
      $start_year_1 = "";
      $end_year_1 = "";

    }

    if (!empty($value->id_bidang_usaha_2)) {

      $we2 = "";
      $id_bidang_usaha_2 = $value->bidang_usaha2->bidang_usaha;
      $other_bidang_usaha_2 = $value->other_bidang_usaha_2;
      $start_year_2 = $value->start_year_2;
      $end_year_2 = $value->end_year_2;

    } else {

      $we2 = "hidden";
      $id_bidang_usaha_2 = "";
      $other_bidang_usaha_2 = "";
      $start_year_2 = "";
      $end_year_2 = "";

    }

    if (!empty($value->id_bidang_usaha_3)) {

      $we3 = "";
      $id_bidang_usaha_3 = $value->bidang_usaha3->bidang_usaha;
      $other_bidang_usaha_3 = $value->other_bidang_usaha_3;
      $start_year_3 = $value->start_year_3;
      $end_year_3 = $value->end_year_3;

    } else {

      $we3 = "hidden";
      $id_bidang_usaha_3 = "";
      $other_bidang_usaha_3 = "";
      $start_year_3 = "";
      $end_year_3 = "";

    }

    if (!empty($value->id_bidang_usaha_4)) {

      $we4 = "";
      $id_bidang_usaha_4 = $value->bidang_usaha4->bidang_usaha;
      $other_bidang_usaha_4 = $value->other_bidang_usaha_4;
      $start_year_4 = $value->start_year_4;
      $end_year_4 = $value->end_year_4;

    } else {

      $we4 = "hidden";
      $id_bidang_usaha_4 = "";
      $other_bidang_usaha_4 = "";
      $start_year_4 = "";
      $end_year_4 = "";

    }
  }

  return view('admin.vacancy_advertising.personal_detail', compact('pelamar','detail_edu','detail_we','ket','we1','we2','we3','we4','id_bidang_usaha_4','other_bidang_usaha_4','start_year_4','end_year_4','id_bidang_usaha_3','other_bidang_usaha_3','start_year_3','end_year_3','id_bidang_usaha_2','other_bidang_usaha_2','start_year_2','end_year_2','id_bidang_usaha_1','other_bidang_usaha_1','start_year_1','end_year_1','loker1','loker2','loker3','loker4'));
}
public function update_tabel($id_iklan,$status_pelamar){
  $data['pelamar'] = Pelamar::where('status_pelamar',$status_pelamar)->get();
  $data['iklan'] = Iklan::find($id_iklan);
  return view('admin.vacancy_advertising.detail_pelamar',$data);
}

public function get_adv_media(request $request){
  $adv_media = AdvertisingMedia::where('id_kategori',$request->id_kategori)->get();
  if($adv_media){
    foreach($adv_media as $row){
      echo "<option value='$row->id'>$row->media</option>";
    }
  }
}
}
