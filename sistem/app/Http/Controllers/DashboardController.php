<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Iklan;
use App\TingkatPendidikan;
use App\MajorGrup;
use App\Major;
use App\AdvertisingCategory;
use App\AdvertisingMedia;
use App\TanggalPsychotest;
use Carbon\Carbon;
use DB;
use Input;
use App\Loker;

class DashboardController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

	publiC function vacancy_dashboard()
	{
		// echo Carbon::today();
		$loker = Loker::OrderBy('id_iklan','ASC')->get();
		$iklan = Iklan::OrderBy('id','ASC')->where('actual_end_date', '>=', Carbon::today())->get();
		return view('admin.dashboard.vacancy_dashboard', compact('loker','iklan'));
	}

	public function main_dashboard(){
		return view('admin.dashboard.main_dashboard');
	}

	public function applicant_dashboard(){
		return view('admin.dashboard.applicant_dashboard');
	}

	public function calendar_psychotest(){
		$psychotest = TanggalPsychotest::all();
		$events = array();
		foreach($psychotest as $value){
			$e = array();
			$e['id'] = $value->id;
			$e['title'] = "Quota left $value->kuota_left, Quota $value->kuota, ".$value->kota->kota." | ".$value->test_method->method;
			$e['start'] = $value->tanggal;
			$e['end'] = $value->tanggal;
			$e['allDay'] = TRUE;
			$e['tanggal'] = $value->tanggal;
			$e['kuota'] = $value->kuota;
			$e['kuota_left'] = $value->kuota_left;
			$e['id_kota'] = $value->id_kota;
			array_push($events,$e);
		}
		echo json_encode($events);
	}

	public function calendar_data(Request $request){
		$data['psychotest'] = TanggalPsychotest::where('tanggal',$request->tanggal)->get();
		// $data['applicant'] = TanggalPsychotest::where('tanggal',$request->tanggal)->first()->pelamar()->get();
		return view('admin.dashboard.calendar_data',$data);
	}

}
