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
    
	publiC function index()
	{
		$loker = Loker::OrderBy('id_iklan','ASC')->get();
		$iklan = Iklan::OrderBy('id','ASC')->where('actual_end_date', '>=', Carbon::now())->get();
		return view('admin.dashboard.index', compact('loker','iklan'));
	}
    
}
