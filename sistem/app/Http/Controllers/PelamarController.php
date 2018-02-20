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

        return view('admin.pelamar.index', compact('pelamar'));
    }

    public function detail_pelamar($id)
    {
        $pelamar = Pelamar::where('id', $id)->get();
        $detail_edu = DetailEducation::where('id_pelamar', $id)->get();
        $detail_we = DetailWorkExperience::where('id_pelamar', $id)->get();
        $loker1 = "";
        $loker2 = "";
        $loker3 = "";
        $loker4 = "";

        foreach ($pelamar as  $value) {
            $edu_level1 = $value->tingkat_pendidikan->tingkat;
            $loker1 = Loker::where('no_rcr', $value->job_interest_1)->value('position_name');
            $loker2 = Loker::where('no_rcr', $value->job_interest_2)->value('position_name');
            $loker3 = Loker::where('no_rcr', $value->job_interest_3)->value('position_name');
            $loker4 = Loker::where('no_rcr', $value->job_interest_4)->value('position_name');
        }

        foreach ($detail_edu as $value) {
            $edu_level2 = $value->tingkat_pendidikan1->tingkat;
        }

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

        return view('admin.pelamar.edit', compact('status_pelamar','status_dashboard'));
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

            return redirect('pelamar')->with('message', 'Data tidak ada yang dirubah');

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

                if ($status_pelamar_new == "Passed") {

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

                if ($status_pelamar_new == "Passed") {

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

                if ($status_pelamar_new == "Passed") {

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

                if ($status_pelamar_new == "Passed") {

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

            return redirect('pelamar')->with('message','Data berhasil diubah!');

        }
    }
    
}
