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
use App\AdvertisingCategory;
use App\TingkatPendidikan;
use App\TanggalPsychotest;
use App\Pelamar;
use App\Iklan;
use App\DetailEducation;
use App\DetailWorkExperience;
use App\TestMethod;
use Input;
use Intervention\Image\Facades\Image as Image;
use Carbon\Carbon;
use App\Akreditasi;
use App\Loker;

class PelamarController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function tampil_pelamar()
	{
		$pelamar = Pelamar::all();
		$pelamar_failed_recruitment = Pelamar::where('status_pelamar','Failed_Recruitment')->get();
		return view('admin.pelamar.index', compact('pelamar','pelamar_failed_recruitment'));
	}

	public function edit_pelamar(Request $request){
		// echo "hi";
		$data['id'] = $request->id;
		$data['status_pelamar'] = Pelamar::findOrfail($data['id']);
		return view('admin.pelamar.edit',$data);
	}

	public function detail_pelamar($id)
	{
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

		return view('admin.pelamar.detail', compact('pelamar','detail_edu','detail_we','ket','we1','we2','we3','we4','id_bidang_usaha_4','other_bidang_usaha_4','start_year_4','end_year_4','id_bidang_usaha_3','other_bidang_usaha_3','start_year_3','end_year_3','id_bidang_usaha_2','other_bidang_usaha_2','start_year_2','end_year_2','id_bidang_usaha_1','other_bidang_usaha_1','start_year_1','end_year_1','loker1','loker2','loker3','loker4'));
	}

	public function edit($id)
	{
		$status_pelamar = Pelamar::findOrfail($id);

		return view('admin.pelamar.edit', compact('status_pelamar'));
	}

	public function update($id, Request $request)
	{
		$status_pelamar_old = Pelamar::findOrfail($id);
		$status_pelamar_new = $request->status_pelamar;
		$id_iklan = $request->id_iklan;
		$job_interest_1 = $request->job_interest_1;
		$job_interest_2 = $request->job_interest_2;
		$job_interest_3 = $request->job_interest_3;
		$job_interest_4 = $request->job_interest_4;
		$keterangan = $request->keterangan;

		if($status_pelamar_new == $status_pelamar_old->status_pelamar) {

			return redirect('pelamar')->with('message', 'Data tidak ada yang dirubah')->with('panel','danger');

		} else {

			if ($keterangan == "failed_fresh" or $keterangan == "failed_exp") {
				$jml_job_interest_1 = 0;
				$jml_job_interest_2 = 0;
				$jml_job_interest_3 = 0;
				$jml_job_interest_4 = 0;
			} else {
				$jml_job_interest_1 = Loker::where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_1)->value($keterangan);
				$jml_job_interest_2 = Loker::where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_2)->value($keterangan);
				$jml_job_interest_3 = Loker::where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_3)->value($keterangan);
				$jml_job_interest_4 = Loker::where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_4)->value($keterangan);
			}

			if(!empty($job_interest_1)) {

				if ($status_pelamar_new == "PG") {

					if ($keterangan == "awaiting_fresh") {
						$jml_actual = Loker::where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_1)->value('actual_fresh');
						$keterangan_new = "actual_fresh";
						DB::table('loker')->where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_1)->update(['awaiting_fresh' => $jml_job_interest_1 - 1]);
						DB::table('loker')->where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_1)->update(['actual_fresh' => $jml_actual + 1]);
					} elseif ($keterangan == "awaiting_exp") {
						$jml_actual = Loker::where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_1)->value('actual_exp');
						$keterangan_new = "actual_exp";
						DB::table('loker')->where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_1)->update(['awaiting_exp' => $jml_job_interest_1 - 1]);
						DB::table('loker')->where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_1)->update(['actual_exp' => $jml_actual + 1]);
					} elseif ($keterangan == "failed_fresh") {
						$jml_actual = Loker::where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_1)->value('actual_fresh');
						$keterangan_new = "actual_fresh";
						DB::table('loker')->where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_1)->update(['actual_fresh' => $jml_actual + 1]);
					} elseif ($keterangan == "failed_exp") {
						$jml_actual = Loker::where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_1)->value('actual_exp');
						$keterangan_new = "actual_exp";
						DB::table('loker')->where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_1)->update(['actual_exp' => $jml_actual + 1]);
					}
				} elseif ($status_pelamar_new == "Awaiting") {
					if ($keterangan == "actual_fresh") {
						$jml_actual = Loker::where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_1)->value('awaiting_fresh');
						$keterangan_new = "awaiting_fresh";
						DB::table('loker')->where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_1)->update(['actual_fresh' => $jml_job_interest_1 - 1]);
						DB::table('loker')->where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_1)->update(['awaiting_fresh' => $jml_actual + 1]);
					} elseif ($keterangan == "actual_exp") {
						$jml_actual = Loker::where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_1)->value('awaiting_exp');
						$keterangan_new = "awaiting_exp";
						DB::table('loker')->where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_1)->update(['actual_exp' => $jml_job_interest_1 - 1]);
						DB::table('loker')->where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_1)->update(['awaiting_exp' => $jml_actual + 1]);
					} elseif ($keterangan == "failed_fresh") {
						$jml_actual = Loker::where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_1)->value('awaiting_fresh');
						$keterangan_new = "awaiting_fresh";
						DB::table('loker')->where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_1)->update(['awaiting_fresh' => $jml_actual + 1]);
					} elseif ($keterangan == "failed_exp") {
						$jml_actual = Loker::where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_1)->value('awaiting_exp');
						$keterangan_new = "awaiting_exp";
						DB::table('loker')->where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_1)->update(['awaiting_exp' => $jml_actual + 1]);
					}
				} elseif ($status_pelamar_new == "Failed") {
					if ($keterangan == "actual_fresh") {
						$jml_actual = Loker::where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_1)->value('actual_fresh');
						$keterangan_new = "failed_fresh";
						DB::table('loker')->where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_1)->update(['actual_fresh' => $jml_job_interest_1 - 1]);
					} elseif ($keterangan == "actual_exp") {
						$jml_actual = Loker::where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_1)->value('actual_exp');
						$keterangan_new = "failed_exp";
						DB::table('loker')->where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_1)->update(['actual_exp' => $jml_job_interest_1 - 1]);
					} elseif ($keterangan == "awaiting_fresh") {
						$jml_actual = Loker::where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_1)->value('awaiting_fresh');
						$keterangan_new = "failed_fresh";
						DB::table('loker')->where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_1)->update(['awaiting_fresh' => $jml_actual - 1]);
					} elseif ($keterangan == "awaiting_exp") {
						$jml_actual = Loker::where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_1)->value('awaiting_exp');
						$keterangan_new = "failed_exp";
						DB::table('loker')->where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_1)->update(['awaiting_exp' => $jml_actual - 1]);
					}
				}
			}

			if(!empty($job_interest_2)) {

				if ($status_pelamar_new == "PG") {

					if ($keterangan == "awaiting_fresh") {
						$jml_actual = Loker::where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_2)->value('actual_fresh');
						$keterangan_new = "actual_fresh";
						DB::table('loker')->where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_2)->update(['awaiting_fresh' => $jml_job_interest_2 - 1]);
						DB::table('loker')->where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_2)->update(['actual_fresh' => $jml_actual + 1]);
					} elseif ($keterangan == "awaiting_exp") {
						$jml_actual = Loker::where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_2)->value('actual_exp');
						$keterangan_new = "actual_exp";
						DB::table('loker')->where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_2)->update(['awaiting_exp' => $jml_job_interest_2 - 1]);
						DB::table('loker')->where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_2)->update(['actual_exp' => $jml_actual + 1]);
					} elseif ($keterangan == "failed_fresh") {
						$jml_actual = Loker::where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_2)->value('actual_fresh');
						$keterangan_new = "actual_fresh";
						DB::table('loker')->where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_2)->update(['actual_fresh' => $jml_actual + 1]);
					} elseif ($keterangan == "failed_exp") {
						$jml_actual = Loker::where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_2)->value('actual_exp');
						$keterangan_new = "actual_exp";
						DB::table('loker')->where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_2)->update(['actual_exp' => $jml_actual + 1]);
					}
				} elseif ($status_pelamar_new == "Awaiting") {
					if ($keterangan == "actual_fresh") {
						$jml_actual = Loker::where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_2)->value('awaiting_fresh');
						$keterangan_new = "awaiting_fresh";
						DB::table('loker')->where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_2)->update(['actual_fresh' => $jml_job_interest_2 - 1]);
						DB::table('loker')->where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_2)->update(['awaiting_fresh' => $jml_actual + 1]);
					} elseif ($keterangan == "actual_exp") {
						$jml_actual = Loker::where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_2)->value('awaiting_exp');
						$keterangan_new = "awaiting_exp";
						DB::table('loker')->where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_2)->update(['actual_exp' => $jml_job_interest_2 - 1]);
						DB::table('loker')->where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_2)->update(['awaiting_exp' => $jml_actual + 1]);
					} elseif ($keterangan == "failed_fresh") {
						$jml_actual = Loker::where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_2)->value('awaiting_fresh');
						$keterangan_new = "awaiting_fresh";
						DB::table('loker')->where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_2)->update(['awaiting_fresh' => $jml_actual + 1]);
					} elseif ($keterangan == "failed_exp") {
						$jml_actual = Loker::where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_2)->value('awaiting_exp');
						$keterangan_new = "awaiting_exp";
						DB::table('loker')->where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_2)->update(['awaiting_exp' => $jml_actual + 1]);
					}
				} elseif ($status_pelamar_new == "Failed") {
					if ($keterangan == "actual_fresh") {
						$jml_actual = Loker::where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_2)->value('actual_fresh');
						$keterangan_new = "failed_fresh";
						DB::table('loker')->where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_2)->update(['actual_fresh' => $jml_job_interest_2 - 1]);
					} elseif ($keterangan == "actual_exp") {
						$jml_actual = Loker::where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_2)->value('actual_exp');
						$keterangan_new = "failed_exp";
						DB::table('loker')->where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_2)->update(['actual_exp' => $jml_job_interest_2 - 1]);
					} elseif ($keterangan == "awaiting_fresh") {
						$jml_actual = Loker::where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_2)->value('awaiting_fresh');
						$keterangan_new = "failed_fresh";
						DB::table('loker')->where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_2)->update(['awaiting_fresh' => $jml_actual - 1]);
					} elseif ($keterangan == "awaiting_exp") {
						$jml_actual = Loker::where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_2)->value('awaiting_exp');
						$keterangan_new = "failed_exp";
						DB::table('loker')->where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_2)->update(['awaiting_exp' => $jml_actual - 1]);
					}
				}
			}

			if(!empty($job_interest_3)) {

				if ($status_pelamar_new == "PG") {

					if ($keterangan == "awaiting_fresh") {
						$jml_actual = Loker::where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_3)->value('actual_fresh');
						$keterangan_new = "actual_fresh";
						DB::table('loker')->where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_3)->update(['awaiting_fresh' => $jml_job_interest_3 - 1]);
						DB::table('loker')->where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_3)->update(['actual_fresh' => $jml_actual + 1]);
					} elseif ($keterangan == "awaiting_exp") {
						$jml_actual = Loker::where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_3)->value('actual_exp');
						$keterangan_new = "actual_exp";
						DB::table('loker')->where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_3)->update(['awaiting_exp' => $jml_job_interest_3 - 1]);
						DB::table('loker')->where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_3)->update(['actual_exp' => $jml_actual + 1]);
					} elseif ($keterangan == "failed_fresh") {
						$jml_actual = Loker::where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_3)->value('actual_fresh');
						$keterangan_new = "actual_fresh";
						DB::table('loker')->where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_3)->update(['actual_fresh' => $jml_actual + 1]);
					} elseif ($keterangan == "failed_exp") {
						$jml_actual = Loker::where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_3)->value('actual_exp');
						$keterangan_new = "actual_exp";
						DB::table('loker')->where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_3)->update(['actual_exp' => $jml_actual + 1]);
					}
				} elseif ($status_pelamar_new == "Awaiting") {
					if ($keterangan == "actual_fresh") {
						$jml_actual = Loker::where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_3)->value('awaiting_fresh');
						$keterangan_new = "awaiting_fresh";
						DB::table('loker')->where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_3)->update(['actual_fresh' => $jml_job_interest_3 - 1]);
						DB::table('loker')->where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_3)->update(['awaiting_fresh' => $jml_actual + 1]);
					} elseif ($keterangan == "actual_exp") {
						$jml_actual = Loker::where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_3)->value('awaiting_exp');
						$keterangan_new = "awaiting_exp";
						DB::table('loker')->where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_3)->update(['actual_exp' => $jml_job_interest_3 - 1]);
						DB::table('loker')->where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_3)->update(['awaiting_exp' => $jml_actual + 1]);
					} elseif ($keterangan == "failed_fresh") {
						$jml_actual = Loker::where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_3)->value('awaiting_fresh');
						$keterangan_new = "awaiting_fresh";
						DB::table('loker')->where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_3)->update(['awaiting_fresh' => $jml_actual + 1]);
					} elseif ($keterangan == "failed_exp") {
						$jml_actual = Loker::where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_3)->value('awaiting_exp');
						$keterangan_new = "awaiting_exp";
						DB::table('loker')->where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_3)->update(['awaiting_exp' => $jml_actual + 1]);
					}
				} elseif ($status_pelamar_new == "Failed") {
					if ($keterangan == "actual_fresh") {
						$jml_actual = Loker::where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_3)->value('actual_fresh');
						$keterangan_new = "failed_fresh";
						DB::table('loker')->where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_3)->update(['actual_fresh' => $jml_job_interest_3 - 1]);
					} elseif ($keterangan == "actual_exp") {
						$jml_actual = Loker::where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_3)->value('actual_exp');
						$keterangan_new = "failed_exp";
						DB::table('loker')->where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_3)->update(['actual_exp' => $jml_job_interest_3 - 1]);
					} elseif ($keterangan == "awaiting_fresh") {
						$jml_actual = Loker::where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_3)->value('awaiting_fresh');
						$keterangan_new = "failed_fresh";
						DB::table('loker')->where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_3)->update(['awaiting_fresh' => $jml_actual - 1]);
					} elseif ($keterangan == "awaiting_exp") {
						$jml_actual = Loker::where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_3)->value('awaiting_exp');
						$keterangan_new = "failed_exp";
						DB::table('loker')->where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_3)->update(['awaiting_exp' => $jml_actual - 1]);
					}
				}
			}

			if(!empty($job_interest_4)) {

				if ($status_pelamar_new == "PG") {

					if ($keterangan == "awaiting_fresh") {
						$jml_actual = Loker::where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_4)->value('actual_fresh');
						$keterangan_new = "actual_fresh";
						DB::table('loker')->where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_4)->update(['awaiting_fresh' => $jml_job_interest_4 - 1]);
						DB::table('loker')->where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_4)->update(['actual_fresh' => $jml_actual + 1]);
					} elseif ($keterangan == "awaiting_exp") {
						$jml_actual = Loker::where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_4)->value('actual_exp');
						$keterangan_new = "actual_exp";
						DB::table('loker')->where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_4)->update(['awaiting_exp' => $jml_job_interest_4 - 1]);
						DB::table('loker')->where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_4)->update(['actual_exp' => $jml_actual + 1]);
					} elseif ($keterangan == "failed_fresh") {
						$jml_actual = Loker::where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_4)->value('actual_fresh');
						$keterangan_new = "actual_fresh";
						DB::table('loker')->where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_4)->update(['actual_fresh' => $jml_actual + 1]);
					} elseif ($keterangan == "failed_exp") {
						$jml_actual = Loker::where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_4)->value('actual_exp');
						$keterangan_new = "actual_exp";
						DB::table('loker')->where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_4)->update(['actual_exp' => $jml_actual + 1]);
					}
				} elseif ($status_pelamar_new == "Awaiting") {
					if ($keterangan == "actual_fresh") {
						$jml_actual = Loker::where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_4)->value('awaiting_fresh');
						$keterangan_new = "awaiting_fresh";
						DB::table('loker')->where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_4)->update(['actual_fresh' => $jml_job_interest_4 - 1]);
						DB::table('loker')->where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_4)->update(['awaiting_fresh' => $jml_actual + 1]);
					} elseif ($keterangan == "actual_exp") {
						$jml_actual = Loker::where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_4)->value('awaiting_exp');
						$keterangan_new = "awaiting_exp";
						DB::table('loker')->where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_4)->update(['actual_exp' => $jml_job_interest_4 - 1]);
						DB::table('loker')->where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_4)->update(['awaiting_exp' => $jml_actual + 1]);
					} elseif ($keterangan == "failed_fresh") {
						$jml_actual = Loker::where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_4)->value('awaiting_fresh');
						$keterangan_new = "awaiting_fresh";
						DB::table('loker')->where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_4)->update(['awaiting_fresh' => $jml_actual + 1]);
					} elseif ($keterangan == "failed_exp") {
						$jml_actual = Loker::where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_4)->value('awaiting_exp');
						$keterangan_new = "awaiting_exp";
						DB::table('loker')->where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_4)->update(['awaiting_exp' => $jml_actual + 1]);
					}
				} elseif ($status_pelamar_new == "Failed") {
					if ($keterangan == "actual_fresh") {
						$jml_actual = Loker::where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_4)->value('actual_fresh');
						$keterangan_new = "failed_fresh";
						DB::table('loker')->where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_4)->update(['actual_fresh' => $jml_job_interest_4 - 1]);
					} elseif ($keterangan == "actual_exp") {
						$jml_actual = Loker::where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_4)->value('actual_exp');
						$keterangan_new = "failed_exp";
						DB::table('loker')->where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_4)->update(['actual_exp' => $jml_job_interest_4 - 1]);
					} elseif ($keterangan == "awaiting_fresh") {
						$jml_actual = Loker::where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_4)->value('awaiting_fresh');
						$keterangan_new = "failed_fresh";
						DB::table('loker')->where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_4)->update(['awaiting_fresh' => $jml_actual - 1]);
					} elseif ($keterangan == "awaiting_exp") {
						$jml_actual = Loker::where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_4)->value('awaiting_exp');
						$keterangan_new = "failed_exp";
						DB::table('loker')->where('id_iklan', $id_iklan)->where('no_rcr', $job_interest_4)->update(['awaiting_exp' => $jml_actual - 1]);
					}
				}
			}

			DB::table('pelamar')->where('id', $id)->update(['status_pelamar' => $status_pelamar_new, 'keterangan' => $keterangan_new]);

			return redirect('pelamar')->with('message','Data berhasil diubah!')->with('panel','success');

		}
	}

	public function filter(Request $request){
		$pelamar = Pelamar::where('status_pelamar',$request->filter)->get();
		if($pelamar->count()>0){
			foreach($pelamar as $value){
				echo "<tr>";
				$lbl = "";
				if($value->status_pelamar == "PG") {
					$lbl = "label-success";
				} elseif ($value->status_pelamar == "Awaiting") {
					$lbl = "label-warning";
				} else {
					$lbl = "label-danger";
				}
				echo "<td>".$value->no_applicant."</td>";
				echo "<td>".$value->nama."</td>";
				echo "<td>".$value->tingkat_pendidikan->tingkat."</td>";
				echo "<td>".$value->institusi->nama_institusi."</td>";
				echo "<td>".$value->iklan->advertising_media->media."</td>";
				echo "<td><span class='label label-sm $lbl arrowed arrowed-righ'>".$value->status_pelamar."</span></td>";
				echo "<td>";
				echo "<div class='btn-group'>";
				echo "<button class='btn btn-xs btn-success' onclick=window.location.href='pelamar/$value->id/detail' title='Detail Pelamar'>";
				echo "<i class='ace-icon fa fa-search bigger-120'></i>";
				echo "</button>";
				echo "<button class='btn btn-xs btn-info' onclick=window.location.href='pelamar/$value->id/edit' title='Edit Status Pelamar'>";
				echo "<i class='ace-icon fa fa-pencil bigger-120'></i>";
				echo "</button>";
				echo "</div>";
				echo "</td>";
				echo "</tr>";
			}
		}
	}

	public function export_pelamar(Request $request){
		if($request->status_pelamar == "All"){
			$pelamar = Pelamar::all();
		}else{
			$pelamar = Pelamar::where('status_pelamar',$request->status_pelamar)->get();
		}
		if($pelamar->count() > 0){
			$delimeter = '|';
			$filename = "Pelamar_".$request->status_pelamar."_".date('Y-m-d').".csv";
			$f = fopen('php://memory', 'w');
			$header = array("tabel_pelamar");
			fputcsv($f,$header,$delimeter);
			foreach($pelamar as $value){
				$lineData = array(
					// $value->id,
					$value->no_applicant,
					$value->job_interest_1,
					$value->job_interest_2,
					$value->job_interest_3,
					$value->job_interest_4,
					$value->id_iklan,
					$value->medion_employee_name,
					$value->nama,
					$value->jenis_kelamin,
					$value->status,
					$value->tgl_lahir,
					$value->email,
					$value->mobile_phone,
					$value->photo,
					$value->id_tingkat_pendidikan,
					$value->id_institusi,
					$value->other_institusi,
					$value->id_major,
					$value->other_major,
					$value->gpa,
					$value->start_year_education,
					$value->end_year_education,
					$value->id_bidang_usaha,
					$value->other_bidang_usaha,
					$value->start_year_work_experience,
					$value->end_year_work_experience,
					$value->id_tgl_psychotest,
					$value->pernah_pkl_dimedion,
					$value->tgl_praktek_start,
					$value->tgl_praktek_end,
					$value->pernah_psychotest_dimedion,
					$value->tgl_psychotest_dimedion,
					$value->status_pelamar,
					$value->ip_address,
					$value->browser,
					$value->keterangan
				);
				// echo "<pre>";
				// print_r($lineData);
				// echo "</pre>";
				fputcsv($f,$lineData,$delimeter);
			}

			if($request->status_pelamar == "All"){
				$detail_we = DB::table('pelamar')
				// ->where('pelamar.status_pelamar','=',$request->status_pelamar)
				->join('detail_we','detail_we.id_pelamar','=','pelamar.id')
				->select('detail_we.*')
				->get();

				$detail_edu_bg = DB::table('pelamar')
				->join('detail_edu_bg','detail_edu_bg.id_pelamar','=','pelamar.id')
				->select('detail_edu_bg.*')
				->get();
			}else{
				$detail_we = DB::table('pelamar')
				->where('pelamar.status_pelamar','=',$request->status_pelamar)
				->join('detail_we','detail_we.id_pelamar','=','pelamar.id')
				->select('detail_we.*')
				->get();
				$detail_edu_bg = DB::table('pelamar')
				->where('pelamar.status_pelamar','=',$request->status_pelamar)
				->join('detail_edu_bg','detail_edu_bg.id_pelamar','=','pelamar.id')
				->select('detail_edu_bg.*')
				->get();
			}
			if(count($detail_we) > 0){
				$header = array("tabel_detail_we");
				fputcsv($f,$header,$delimeter);
				foreach($detail_we as $value){
					$lineData = array(
						// $value->id,
						$value->id_pelamar,
						$value->id_bidang_usaha_1,
						$value->other_bidang_usaha_1,
						$value->start_year_1,
						$value->end_year_1,
						$value->id_bidang_usaha_2,
						$value->other_bidang_usaha_2,
						$value->start_year_2,
						$value->end_year_2,
						$value->id_bidang_usaha_3,
						$value->other_bidang_usaha_3,
						$value->start_year_3,
						$value->end_year_3,
						$value->id_bidang_usaha_4,
						$value->other_bidang_usaha_4,
						$value->start_year_4,
						$value->end_year_4
					);
					fputcsv($f,$lineData,$delimeter);
				}
			}
			if(count($detail_edu_bg) > 0){
				$header = array("tabel_detail_edu_bg");
				fputcsv($f,$header,$delimeter);
				foreach($detail_edu_bg as $value){
					$lineData = array(
						// $value->id,
						$value->id_pelamar,
						$value->id_tingkat_pendidikan_1,
						$value->id_institusi_1,
						$value->other_institusi_1,
						$value->id_major_1,
						$value->other_major_1,
						$value->gpa_1,
						$value->start_year_1,
						$value->end_year_1,
						$value->id_tingkat_pendidikan_2,
						$value->id_institusi_2,
						$value->other_institusi_2,
						$value->id_major_2,
						$value->other_major_2,
						$value->gpa_2,
						$value->start_year_2,
						$value->end_year_2
					);
					fputcsv($f,$lineData,$delimeter);
				}
			}


			//move back to beginning of file
			fseek($f, 0);
			//
			// //set headers to download file rather than displayed
			header('Content-Type: text/csv');
			header('Content-Disposition: attachment; filename="' . $filename . '";');
			//
			// //output all remaining data on a file pointer
			fpassthru($f);

		}



	}

	public function import_pelamar(Request $request){
		ini_set('memory_limit','256M');

		$csv=$request->file('file');
		$csv->move(public_path('file_pelamar/'),$csv->getClientOriginalName());

		$nama_file = $csv->getClientOriginalName();
		$ext = $csv->getClientOriginalExtension();
		$path = public_path('file_pelamar/'.$nama_file);

		// we check,file must be have csv extention
		if($ext=="csv")
		{
			$file = fopen($path, "r");
			set_time_limit(0);
			$date_range = $request->date_range;
			$start_date = substr($date_range,0,10);
			$end_date = substr($date_range,-10);
			$tabel = "";
			while (($emapData = fgetcsv($file, 10000, "|")) !== FALSE)
			{
				if($emapData[0]=="tabel_pelamar"){
					$tabel = "pelamar";
					continue;
				}else if($emapData[0]=="tabel_detail_we"){
					$tabel = "detail_we";
					continue;
				}else if($emapData[0]=="tabel_detail_edu_bg"){
					$tabel = "detail_edu_bg";
					continue;
				}
				if($tabel == "pelamar"){
					$pelamar = new Pelamar;
					$pelamar->no_applicant = $emapData[0];
					$pelamar->job_interest_1 =  $emapData[1];
					$pelamar->job_interest_2 = $emapData[2];
					$pelamar->job_interest_3 = $emapData[3];
					$pelamar->job_interest_4 = $emapData[4];
					$pelamar->id_iklan = $emapData[5];
					$pelamar->medion_employee_name = $emapData[6];
					$pelamar->nama = $emapData[7];
					$pelamar->jenis_kelamin = $emapData[8];
					$pelamar->status = $emapData[9];
					$pelamar->tgl_lahir = $emapData[10];
					$pelamar->email = $emapData[11];
					$pelamar->mobile_phone = $emapData[12];
					$pelamar->photo = $emapData[13];
					$pelamar->id_tingkat_pendidikan = $emapData[14];
					$pelamar->id_institusi = $emapData[15];
					$pelamar->other_institusi = $emapData[16];
					$pelamar->id_major = $emapData[17];
					$pelamar->other_major = $emapData[18];
					$pelamar->gpa = $emapData[19];
					$pelamar->start_year_education = $emapData[20];
					$pelamar->end_year_education = $emapData[21];
					$pelamar->id_bidang_usaha = $emapData[22];
					$pelamar->other_bidang_usaha = $emapData[23];
					$pelamar->start_year_work_experience= $emapData[24];
					$pelamar->end_year_work_experience = $emapData[25];
					$pelamar->id_tgl_psychotest = $emapData[26];
					$pelamar->pernah_pkl_dimedion = $emapData[27];
					$pelamar->tgl_praktek_start = $emapData[28];
					$pelamar->tgl_praktek_end = $emapData[29];
					$pelamar->pernah_psychotest_dimedion = $emapData[30];
					$pelamar->tgl_psychotest_dimedion = $emapData[31];
					$pelamar->status_pelamar = $emapData[32];
					$pelamar->ip_address = $emapData[33];
					$pelamar->browser = $emapData[34];
					$pelamar->keterangan = $emapData[35];
					$pelamar->save();
				}else if($tabel == "detail_we"){
					$detail_we = new DetailWorkExperience;
					$detail_we->id_pelamar = $emapData[0];
					$detail_we->id_bidang_usaha_1 = $emapData[1];
					$detail_we->other_bidang_usaha_1 = $emapData[2];
					$detail_we->start_year_1 = $emapData[3];
					$detail_we->end_year_1 = $emapData[4];
					$detail_we->id_bidang_usaha_2 = $emapData[5];
					$detail_we->other_bidang_usaha_2 = $emapData[6];
					$detail_we->start_year_2 = $emapData[7];
					$detail_we->end_year_2 = $emapData[8];
					$detail_we->id_bidang_usaha_3 = $emapData[9];
					$detail_we->other_bidang_usaha_3 = $emapData[10];
					$detail_we->start_year_3 = $emapData[11];
					$detail_we->end_year_3 = $emapData[12];
					$detail_we->id_bidang_usaha_4 = $emapData[13];
					$detail_we->other_bidang_usaha_4 = $emapData[14];
					$detail_we->start_year_4 = $emapData[15];
					$detail_we->end_year_4 = $emapData[16];
					$detail_we->save();
				}else if($tabel == "detail_edu_bg"){
					$detail_edu_bg = new DetailEducation;
					$detail_edu_bg->id_pelamar = $emapData[0];
					$detail_edu_bg->id_tingkat_pendidikan_1 = $emapData[1];
					$detail_edu_bg->id_institusi_1 = $emapData[2];
					$detail_edu_bg->other_institusi_1 = $emapData[3];
					$detail_edu_bg->id_major_1 = $emapData[4];
					$detail_edu_bg->other_major_1 = $emapData[5];
					$detail_edu_bg->gpa_1 = $emapData[6];
					$detail_edu_bg->start_year_1 = $emapData[7];
					$detail_edu_bg->end_year_1 = $emapData[8];
					$detail_edu_bg->id_tingkat_pendidikan_2 = $emapData[9];
					$detail_edu_bg->id_institusi_2 = $emapData[10];
					$detail_edu_bg->other_institusi_2 = $emapData[11];
					$detail_edu_bg->id_major_2 = $emapData[12];
					$detail_edu_bg->other_major_2 = $emapData[13];
					$detail_edu_bg->gpa_2 = $emapData[14];
					$detail_edu_bg->start_year_2 = $emapData[15];
					$detail_edu_bg->end_year_2 = $emapData[16];
					$detail_edu_bg->save();
				}
			}
			fclose($file);
			echo "CSV File has been successfully Imported.";
		}
		else {
			echo "Error: Please Upload only CSV File";
		}
	}

	public function update_tabel($status_pelamar){
		$data['pelamar'] = Pelamar::where('status_pelamar','like','Failed%')->get();
		return view('admin.pelamar.index',$data);
	}

	public function pelamar_inproses(){
		$data['pelamar'] = Pelamar::all();
		$data['kota'] = Kota::all()->lists('kota','id');
		$data['test_method'] = TestMethod::all()->lists('method','id');
		return view('admin.pelamar.pelamar_inproses',$data);
	}

	public function pelamar_awaiting(){
		$data['pelamar'] = Pelamar::all();
		return view('admin.pelamar.pelamar_awaiting',$data);
	}

	public function pelamar_failed(){
		$data['pelamar_recruitment'] = Pelamar::where('status_pelamar','Failed_Recruitment')->get();
		$data['pelamar_prescreening'] = Pelamar::where('status_pelamar','Failed_Prescreening')->get();
		$data['pelamar_psychotest'] = Pelamar::where('status_pelamar','PG')->get();
		$data['pelamar_interview'] = Pelamar::all();
		return view('admin.pelamar.pelamar_failed',$data);

	}

	public function get_psychotest(){
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

	public function tambah_schedule(Request $request){
		$this->validate($request,[
			'tanggal'=>'required',
			'id_kota'=>'required|numeric',
			'kuota'=>'required|numeric',
			'id_test_method'=>'required|numeric'
		]);

		$psychotest = new TanggalPsychotest;
		$psychotest->tanggal = $request->tanggal;
		$psychotest->id_kota = $request->id_kota;
		$psychotest->kuota_left = $request->kuota;
		$psychotest->kuota = $request->kuota;
		$psychotest->id_test_method = $request->id_test_method;
		$psychotest->save();
		return redirect('pelamar_inproses')->with('message','Data berhasil disimpan!')->with('panel','success');
	}

	public function update_schedule(Request $request){
		$this->validate($request,[
			'tanggal'=>'required',
			'kuota'=>'required|numeric',
			'id_kota'=>'required|numeric',
			'id_test_method'=>'required|numeric'
		]);
		$edit = TanggalPsychotest::find($request->id);
		$edit->tanggal = $request->tanggal;
		$edit->kuota = $request->kuota;
		$edit->id_kota = $request->id_kota;
		$edit->id_test_method = $request->id_test_method;
		$edit->save();
		return redirect('pelamar_inproses')->with('message','Data berhasil disimpan!')->with('panel','success');
	}

	public function details($id){
		$data['pelamar_invitation'] = Pelamar::where('id_tgl_psychotest',$id)->where('status_invite','0')->get();
		$data['pelamar_invited'] = Pelamar::where('id_tgl_psychotest',$id)->where('status_invite','1')->get();
		$data['tgl_psychotest'] = TanggalPsychotest::find($id);

		return view('admin.pelamar.pelamar_inproses_details',$data);
	}

	public function add_applicant($id){
		$data['tgl_psychotest'] = TanggalPsychotest::find($id);
		$data['pelamar'] = Pelamar::where('id_tgl_psychotest','<>',$id)->where('status_pelamar','PG')->get();
		$data['id'] = $id;
		return view('admin.pelamar.pelamar_inproses_add_applicant',$data);
	}

	public function add_applicants(Request $request,$id){
		$this->validate($request,[
			'checkbox'=>'required'
		],[
			'checkbox.required'=>'Pilih salah satu applicant yang akan ditambahkan'
		]);
		foreach($request->checkbox as $id_applicant){
			$pelamar = Pelamar::find($id_applicant);
			$pelamar->id_tgl_psychotest = $id;
			$pelamar->save();
		}
		return redirect('pelamar_inproses/add_applicant/'.$id)->with('message','Berhasil menambah applicant!')->with('panel','success');
	}

}
