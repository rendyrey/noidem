<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use App\Bidang_usaha;
use App\Institusi;
use App\Kota;
use App\Major;
use App\MajorGrup;
use App\Provinsi;
use App\TingkatPendidikan;

class JobFairController extends Controller
{
	public function index(){

		$bidang_usaha = Bidang_usaha::all();
		$institusi = Institusi::all();
		$kota = Kota::all();
		$major = Major::all();
		$major_grup = MajorGrup::all();
		$provinsi = Provinsi::all();
        $tingkat_pendidikan = DB::table('tingkat_pendidikan')->orderBy('no_urut','ASC')->get();
    	$dateArray = range(1, 31);
   		$months = array(1=>'January','February','March','April','May','June','July ','August','September','October','November','December');
    	$cur_year = date("Y");
    	$yearArray = range(1985, $cur_year);
    	$attributes = array();
        foreach ( $major as $v ) {
            if ( !isset($attributes[$v->major]) ) {
                $attributes[$v->major] = array();
            }
            $attributes[$v->major_grup->nama_grup][$v->major] = $v->major;
        }
		return view('jobfair.index', compact('bidang_usaha','institusi','kota','major','major_grup','provinsi','dateArray','months','yearArray','cur_year','attributes','tingkat_pendidikan'));
	}    
}
