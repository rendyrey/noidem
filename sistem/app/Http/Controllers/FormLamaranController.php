<?php

namespace App\Http\Controllers;

use App\AdvertisingCategory;
use App\Akreditasi;
use App\Bidang_usaha;
use App\DetailEducation;
use App\DetailWorkExperience;
use App\Iklan;
use App\Institusi;
use App\Kota;
use App\Loker;
use App\Major;
use App\MajorGrup;
use App\Pelamar;
use App\Provinsi;
use App\SyaratPrescreening;
use App\TanggalPsychotest;
use App\TingkatPendidikan;
// use App\KriteriaSyarat;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as Image;

class FormLamaranController extends Controller
{
    public function index()
    {
        $bidang_usaha = Bidang_usaha::all();
        $institusi = Institusi::all();
        $kota = Kota::all();
        $major = Major::all();
        $major_grup = MajorGrup::all();
        $provinsi = Provinsi::all();
        $advertising_category = AdvertisingCategory::all();
        $tingkat_pendidikan = TingkatPendidikan::orderBy('no_urut', 'ASC')->limit(5)->get();
        $tingkat_pendidikan_more = TingkatPendidikan::orderBy('no_urut', 'ASC')->limit(3)->get();
        $dateArray = range(1, 31);
        $months = array(1 => 'January', 'February', 'March', 'April', 'May', 'June', 'July ', 'August', 'September', 'October', 'November', 'December');
        $cur_year = date("Y");
        $yearArray = range(1971, $cur_year);
        $attributes = array();
        foreach ($major as $v) {
            if (!isset($attributes[$v->major])) {
                $attributes[$v->id] = array();
            }
            $attributes[$v->major_grup->nama_grup][$v->id] = $v->major;
        }
        $tanggal_psychotest = TanggalPsychotest::where('tanggal', '>=', Carbon::today())->where('kuota','>',0)->orderBy('tanggal', 'asc')->get();
        $iklan = Iklan::where('domain', 'formlamaran.medion.co.id')->where('actual_end_date', '>=', Carbon::today())->get();
        $arr_iklan = array();
        foreach ($iklan as $value) {
            if (!isset($arr_iklan[$value->advertising_media->media])) {

                $arr_iklan[$value->id] = array();
            }
            $arr_iklan[$value->advertising_category->kategori][$value->id] = $value->advertising_media->media;
        }

        $job_interest = Iklan::job_interest();
        $count_loker = count($job_interest);
        if ($count_loker >= 4) {
            $count_loker = 4;
        } else {
            $count_loker = $count_loker;
        }

        return view('form_lamaran.index', compact('bidang_usaha', 'institusi', 'kota', 'major', 'major_grup', 'provinsi', 'dateArray', 'months', 'yearArray', 'cur_year', 'attributes', 'advertising_category', 'tingkat_pendidikan', 'tanggal_psychotest', 'iklan', 'job_interest', 'count_loker', 'tingkat_pendidikan_more', 'arr_iklan'));
    }

    public function cari_no_applicant()
    {

        $tmp = "APL" . date('Ymd');
        $last_no_app = Pelamar::where('no_applicant', 'like', $tmp . '%')->orderBy('id', 'DESC')->value('no_applicant');

        if ($last_no_app === null) {

            $no_selanjut_y = $tmp . "001";

        } else {

            $x = substr($last_no_app, 11);
            $x = $x + 1;

            $panjang_x = strlen($x);

            if ($panjang_x == 3) {
                $no_selanjut_y = $tmp . $x;
            } else if ($panjang_x == 2) {
                $no_selanjut_y = $tmp . "0" . $x;
            } else if ($panjang_x == 1) {
                $no_selanjut_y = $tmp . "00" . $x;
            } else {
                $no_selanjut_y = $tmp . "000";
            }
        }
        return $no_selanjut_y;
    }

    public function tambah(Request $request)
    {

        $this->validate($request,[
          'id_iklan'=>'required',
          'job_interest_1'=>'required',
          'nama'=>'required',
          'jenis_kelamin'=>'required',
          'status'=>'required',
          'date_of_birth'=>'required|numeric',
          'month_of_birth'=>'required',
          'year_of_birth'=>'required',
          'email'=>'required|email',
          'mobile_phone'=>'required|numeric',
          'photo'=>'required|image|max:1024',
          'id_tingkat_pendidikan'=>'required',
          'id_institusi'=>'required',
          'id_major'=>'required',
          'gpa'=>'required|regex:/^[0-4]\.[0-9]{1,2}$/',
          'start_month_education'=>'required',
          'start_year_education'=>'required',
          'end_month_education'=>'required',
          'end_year_education'=>'required',
          'id_tanggal_psychotest'=>'required'
        ],[
          'id_iklan.required' => 'Vacancy is required',
          'nama.required'=>'Name is required',
          'job_interest_1.required'=>'Job Interest is required',
          'jenis_kelamin.required'=>'Gender is required',
          'status.required'=>'Marital Status is required',
          'date_of_birth.required'=>'Date of birth is required',
          'month_of_birth.required'=>'Month of birth is required',
          'year_of_birth.required'=>'Year of birth is required',
          'email.required'=>'Email is required',
          'email.email'=>'Email must be in e-mail address format',
          'mobile_phone.required'=>'Mobile phone is required',
          'mobile_phone.numeric'=>'Mobile phone must be in numeric format',
          'photo.required'=>'Photo is required',
          'photo.image'=>'Photo must be in image format',
          'photo.max'=>"Photo's size must be under 2 MB",
          'id_tingkat_pendidikan.required'=>'Education level is required',
          'id_institusi.required'=>'Institution is required',
          'id_major.required'=>'Major is required',
          'gpa.required'=>'GPA is required',
          'gpa.regex'=>'GPA format must be X.XX',
          'start_month_education.required'=>'Start Month is required',
          'start_year_education.required'=>'Start Year is required',
          'end_month_education.required'=>'End Month is required',
          'end_year_education.required'=>'End Year is required',
          'id_tanggal_psychotest.required'=>'Psychotest Readiness is required'
        ]);

        $actual_fresh1 = Loker::where('id_iklan', $request->id_iklan)->where('no_rcr', $request->job_interest_1)->value('actual_fresh');
        $actual_fresh2 = Loker::where('id_iklan', $request->id_iklan)->where('no_rcr', $request->job_interest_2)->value('actual_fresh');
        $actual_fresh3 = Loker::where('id_iklan', $request->id_iklan)->where('no_rcr', $request->job_interest_3)->value('actual_fresh');
        $actual_fresh4 = Loker::where('id_iklan', $request->id_iklan)->where('no_rcr', $request->job_interest_4)->value('actual_fresh');

        $actual_pass_fresh1 = Loker::where('id_iklan',$request->id_iklan)->where('no_rcr',$request->job_interest_1)->value('actual_pass_fresh');
        $actual_pass_fresh2 = Loker::where('id_iklan',$request->id_iklan)->where('no_rcr',$request->job_interest_2)->value('actual_pass_fresh');
        $actual_pass_fresh3 = Loker::where('id_iklan',$request->id_iklan)->where('no_rcr',$request->job_interest_3)->value('actual_pass_fresh');
        $actual_pass_fresh4 = Loker::where('id_iklan',$request->id_iklan)->where('no_rcr',$request->job_interest_4)->value('actual_pass_fresh');

        $actual_exp1 = Loker::where('id_iklan', $request->id_iklan)->where('no_rcr', $request->job_interest_1)->value('actual_exp');
        $actual_exp2 = Loker::where('id_iklan', $request->id_iklan)->where('no_rcr', $request->job_interest_1)->value('actual_exp');
        $actual_exp3 = Loker::where('id_iklan', $request->id_iklan)->where('no_rcr', $request->job_interest_1)->value('actual_exp');
        $actual_exp4 = Loker::where('id_iklan', $request->id_iklan)->where('no_rcr', $request->job_interest_1)->value('actual_exp');

        $actual_pass_exp1 = Loker::where('id_iklan',$request->id_iklan)->where('no_rcr',$request->job_interest_1)->value('actual_pass_exp');
        $actual_pass_exp2 = Loker::where('id_iklan',$request->id_iklan)->where('no_rcr',$request->job_interest_2)->value('actual_pass_exp');
        $actual_pass_exp3 = Loker::where('id_iklan',$request->id_iklan)->where('no_rcr',$request->job_interest_3)->value('actual_pass_exp');
        $actual_pass_exp4 = Loker::where('id_iklan',$request->id_iklan)->where('no_rcr',$request->job_interest_4)->value('actual_pass_exp');

        $awaiting_fresh1 = Loker::where('id_iklan', $request->id_iklan)->where('no_rcr', $request->job_interest_1)->value('awaiting_fresh');
        $awaiting_fresh2 = Loker::where('id_iklan', $request->id_iklan)->where('no_rcr', $request->job_interest_2)->value('awaiting_fresh');
        $awaiting_fresh3 = Loker::where('id_iklan', $request->id_iklan)->where('no_rcr', $request->job_interest_3)->value('awaiting_fresh');
        $awaiting_fresh4 = Loker::where('id_iklan', $request->id_iklan)->where('no_rcr', $request->job_interest_4)->value('awaiting_fresh');

        $awaiting_exp1 = Loker::where('id_iklan', $request->id_iklan)->where('no_rcr', $request->job_interest_1)->value('awaiting_exp');
        $awaiting_exp2 = Loker::where('id_iklan', $request->id_iklan)->where('no_rcr', $request->job_interest_2)->value('awaiting_exp');
        $awaiting_exp3 = Loker::where('id_iklan', $request->id_iklan)->where('no_rcr', $request->job_interest_3)->value('awaiting_exp');
        $awaiting_exp4 = Loker::where('id_iklan', $request->id_iklan)->where('no_rcr', $request->job_interest_4)->value('awaiting_exp');

        $actual_pg_fresh1 = Loker::where('id_iklan',$request->id_iklan)->where('no_rcr',$request->job_interest_1)->value('actual_pg_fresh');
        $actual_pg_fresh2 = Loker::where('id_iklan',$request->id_iklan)->where('no_rcr',$request->job_interest_2)->value('actual_pg_fresh');
        $actual_pg_fresh3 = Loker::where('id_iklan',$request->id_iklan)->where('no_rcr',$request->job_interest_3)->value('actual_pg_fresh');
        $actual_pg_fresh4 = Loker::where('id_iklan',$request->id_iklan)->where('no_rcr',$request->job_interest_4)->value('actual_pg_fresh');

        $actual_pg_exp1 = Loker::where('id_iklan',$request->id_iklan)->where('no_rcr',$request->job_interest_1)->value('actual_pg_exp');
        $actual_pg_exp2 = Loker::where('id_iklan',$request->id_iklan)->where('no_rcr',$request->job_interest_2)->value('actual_pg_exp');
        $actual_pg_exp3 = Loker::where('id_iklan',$request->id_iklan)->where('no_rcr',$request->job_interest_3)->value('actual_pg_exp');
        $actual_pg_exp4 = Loker::where('id_iklan',$request->id_iklan)->where('no_rcr',$request->job_interest_4)->value('actual_pg_exp');

       

        $data_exist = Pelamar::where('nama', '=', $request->nama)
            ->where('tgl_lahir', '=', $request->month_of_birth . "/" . $request->date_of_birth . "/" . $request->year_of_birth)
            ->where('mobile_phone', '=', $request->mobile_phone)
            ->exists();

        if ($data_exist) {

            return redirect('/')->with('message', 'Your application can not be processed, because you have applied');

        } else {

            $pelamar = new Pelamar;

            $last_no_app = $this->cari_no_applicant();
            //insert pelamar
            $pelamar->no_applicant = $last_no_app;
            $pelamar->job_interest_1 = $request->job_interest_1;
            $pelamar->job_interest_2 = $request->job_interest_2;
            $pelamar->job_interest_3 = $request->job_interest_3;
            $pelamar->job_interest_4 = $request->job_interest_4;
            $pelamar->id_iklan = $request->id_iklan;
            $pelamar->medion_employee_name = $request->medion_employee_name;
            $pelamar->nama = $request->nama;
            $pelamar->jenis_kelamin = $request->jenis_kelamin;
            $pelamar->status = $request->status;
            $pelamar->tgl_lahir = $request->month_of_birth . "/" . $request->date_of_birth . "/" . $request->year_of_birth;
            $pelamar->email = $request->email;
            $pelamar->mobile_phone = $request->mobile_phone;
            if ($request->file('photo')) {

                $image = $request->file('photo');
                $filename = $request->nama . ' ' . date('Ymd') . '.' . $image->getClientOriginalExtension();
                $path = 'photos/' . $filename;
                Image::make($image->getRealPath())->resize(180, 200)->save($path);
                $pelamar->photo = $filename;

            }
            //kondisi apabila pelamar adalah D3, D4, atau S1
            if ($request->id_tingkat_pendidikan == 1 or $request->id_tingkat_pendidikan == 2 or $request->id_tingkat_pendidikan == 3) {
                $pelamar->id_tingkat_pendidikan = $request->id_tingkat_pendidikan;
                $pelamar->id_institusi = $request->id_institusi;
                $pelamar->other_institusi = $request->other_institusi;
                $pelamar->id_major = $request->id_major;
                $pelamar->other_major = $request->other_major;
                $pelamar->gpa = $request->gpa;
                $pelamar->start_year_education = $request->start_month_education . " " . $request->start_year_education;
                $pelamar->end_year_education = $request->end_month_education . " " . $request->end_year_education;

            } else {

                $pelamar->id_tingkat_pendidikan = $request->id_tingkat_pendidikan_more;
                $pelamar->id_institusi = $request->id_institusi_more;
                $pelamar->other_institusi = $request->other_institusi_more;
                $pelamar->id_major = $request->id_major_more;
                $pelamar->other_major = $request->other_major_more;
                $pelamar->gpa = $request->gpa_more;
                $pelamar->start_year_education = $request->start_month_education_more . " " . $request->start_year_education_more;
                $pelamar->end_year_education = $request->end_month_education_more . " " . $request->end_year_education_more;
            }

            if (!empty($request->id_bidang_usaha)) {

                $pelamar->id_bidang_usaha = $request->id_bidang_usaha;
                $pelamar->other_bidang_usaha = $request->other_bidang_usaha;
                $pelamar->start_year_work_experience = $request->we_start_month . " " . $request->we_start_year;
                $pelamar->end_year_work_experience = $request->we_end_month . " " . $request->we_end_year;

            } else {

                $pelamar->id_bidang_usaha = "";
                $pelamar->other_bidang_usaha = "";
                $pelamar->start_year_work_experience = "";
                $pelamar->end_year_work_experience = "";
            }

            $pelamar->id_tgl_psychotest = $request->id_tanggal_psychotest;
            $pelamar->pernah_pkl_dimedion = $request->pernah_pkl_dimedion;

            if ($request->pernah_pkl_dimedion == "Yes") {
                $pelamar->tgl_praktek_start = $request->practical_start_month . " " . $request->practical_start_year;
                $pelamar->tgl_praktek_end = $request->practical_end_month . " " . $request->practical_end_year;

            } else {

                $pelamar->tgl_praktek_start = "";
                $pelamar->tgl_praktek_end = "";
            }
            $pelamar->pernah_psychotest_dimedion = $request->pernah_psychotest_dimedion;

            if ($request->pernah_psychotest_dimedion == "Yes") {

                $pelamar->tgl_psychotest_dimedion = $request->tgl_psychotest_month . " " . $request->tgl_psychotest_year;

            } else {

                $pelamar->tgl_psychotest_dimedion = "";
            }

            $akreditasi = Akreditasi::where('id_institusi', '=', $pelamar->id_institusi)->where('id_major', '=', $pelamar->id_major)->value('akreditasi');
            $level = TingkatPendidikan::where('id', '=', $pelamar->id_tingkat_pendidikan)->value('tingkat');
            $lama_studi = $pelamar->end_year_education - $pelamar->start_year_education;
            $from_usia = Carbon::createFromDate($request->year_of_birth, $request->month_of_birth, $request->date_of_birth);
            $to_usia = Carbon::today();
            $usia = $from_usia->diff($to_usia)->y;

            //check ada atau nggak
            $check_syarat = SyaratPrescreening::where('work_experience','No')->where('id_tingkat_pendidikan',$pelamar->id_tingkat_pendidikan)
            ->where('accreditation',$akreditasi)->where('gpa','<=',$request->gpa)
            ->where('age','>=',$usia)->where('study_period','>=',$lama_studi)->first();
            dd($check_syarat);

            //Freshgraduate
            if ($request->id_bidang_usaha == "") {

                //-- update actual fresh
                $jml_actual_fresh1 = $actual_fresh1 + 1;
                $jml_actual_fresh2 = $actual_fresh2 + 1;
                $jml_actual_fresh3 = $actual_fresh3 + 1;
                $jml_actual_fresh4 = $actual_fresh4 + 1;

                if ($request->job_interest_1) {
                    $update_pelamar_passed1 = Loker::where('id_iklan', $request->id_iklan)->where('no_rcr', $request->job_interest_1)->first();
                    $update_pelamar_passed1->actual_fresh = $jml_actual_fresh1;
                    $update_pelamar_passed1->save();
                }

                if ($request->job_interest_2) {
                    $update_pelamar_passed2 = Loker::where('id_iklan', $request->id_iklan)->where('no_rcr', $request->job_interest_2)->first();
                    $update_pelamar_passed2->actual_fresh = $jml_actual_fresh2;
                    $update_pelamar_passed2->save();
                }

                if ($request->job_interest_3) {
                    $update_pelamar_passed3 = Loker::where('id_iklan', $request->id_iklan)->where('no_rcr', $request->job_interest_3)->first();
                    $update_pelamar_passed3->actual_fresh = $jml_actual_fresh3;
                    $update_pelamar_passed3->save();
                }

                if ($request->job_interest_4) {
                    $update_pelamar_passed4 = Loker::where('id_iklan', $request->id_iklan)->where('no_rcr', $request->job_interest_4)->first();
                    $update_pelamar_passed4->actual_fresh = $jml_actual_fresh4;
                    $update_pelamar_passed4->save();
                }
              

                if ($level == "S1") {

                    if ($lama_studi <= 5 and $akreditasi == "A" and $request->gpa >= 2.75 and $usia >= 18) {

                        $pelamar->status_pelamar = "Passed";
                        $pelamar->keterangan = "actual_fresh";

                    } elseif ($lama_studi <= 5 and $akreditasi == "B" and $request->gpa >= 3 and $usia >= 18) {

                        $pelamar->status_pelamar = "Passed";
                        $pelamar->keterangan = "actual_fresh";

                    } elseif ($lama_studi <= 5 and $request->gpa >= 3 and $usia >= 18) {

                        $pelamar->status_pelamar = "Awaiting";
                        $pelamar->keterangan = "awaiting_fresh";

                    } else {

                        $pelamar->status_pelamar = "Failed";
                        $pelamar->keterangan = "failed_fresh";
                    }

                } elseif ($level == "D3") {

                    if ($lama_studi <= 3 and $akreditasi == "A" and $request->gpa >= 2.75 and $usia >= 18) {

                        $pelamar->status_pelamar = "Passed";
                        $pelamar->keterangan = "actual_fresh";

                    } elseif ($lama_studi <= 3 and $akreditasi == "B" and $request->gpa >= 3 and $usia >= 18) {

                        $pelamar->status_pelamar = "Passed";
                        $pelamar->keterangan = "actual_fresh";

                    } elseif ($lama_studi <= 3 and $request->gpa >= 3 and $usia >= 18) {

                        $pelamar->status_pelamar = "Awaiting";
                        $pelamar->keterangan = "awaiting_fresh";

                    } else {

                        $pelamar->status_pelamar = "Failed";
                        $pelamar->keterangan = "failed_fresh";
                    }

                } elseif ($level == "D4") {

                    if ($lama_studi <= 4 and $akreditasi == "A" and $request->gpa >= 2.75 and $usia >= 18) {

                        $pelamar->status_pelamar = "Passed";
                        $pelamar->keterangan = "actual_fresh";

                    } elseif ($lama_studi <= 4 and $akreditasi == "B" and $request->gpa >= 3 and $usia >= 18) {

                        $pelamar->status_pelamar = "Passed";
                        $pelamar->keterangan = "actual_fresh";

                    } elseif ($lama_studi <= 4 and $request->gpa >= 3 and $usia >= 18) {

                        $pelamar->status_pelamar = "Awaiting";
                        $pelamar->keterangan = "awaiting_fresh";

                    } else {

                        $pelamar->status_pelamar = "Failed";
                        $pelamar->keterangan = "failed_fresh";
                    }
                }

                if ($pelamar->status_pelamar == "Passed") {
                    // -- update kuota psychotest
                    $id_tgl_psychotest = $request->id_tanggal_psychotest;
                    $get_psychotest = TanggalPsychotest::where('id',$id_tgl_psychotest)->first();
                    $current_kuota = $get_psychotest->kuota;
                    $min_kuota = $current_kuota-1;

                    $update_tgl_psychotest = TanggalPsychotest::where('id',$id_tgl_psychotest)->first();
                    $update_tgl_psychotest->kuota = $min_kuota;
                    $update_tgl_psychotest->save();
                    // --end kuota psychotest

                    //-- update actual pass fresh
                    $jml_actual_pass_fresh1 = $actual_pass_fresh1 + 1;
                    $jml_actual_pass_fresh2 = $actual_pass_fresh2 + 1;
                    $jml_actual_pass_fresh3 = $actual_pass_fresh3 + 1;
                    $jml_actual_pass_fresh4 = $actual_pass_fresh4 + 1;

                    if ($request->job_interest_1) {
                        $update_pelamar_passed1 = Loker::where('id_iklan', $request->id_iklan)->where('no_rcr', $request->job_interest_1)->first();
                        $update_pelamar_passed1->actual_pass_fresh = $jml_actual_pass_fresh1;
                        $update_pelamar_passed1->save();
                    }

                    if ($request->job_interest_2) {
                        $update_pelamar_passed2 = Loker::where('id_iklan', $request->id_iklan)->where('no_rcr', $request->job_interest_2)->first();
                        $update_pelamar_passed2->actual_pass_fresh = $jml_actual_pass_fresh2;
                        $update_pelamar_passed2->save();
                    }

                    if ($request->job_interest_3) {
                        $update_pelamar_passed3 = Loker::where('id_iklan', $request->id_iklan)->where('no_rcr', $request->job_interest_3)->first();
                        $update_pelamar_passed3->actual_pass_fresh = $jml_actual_pass_fresh3;
                        $update_pelamar_passed3->save();
                    }

                    if ($request->job_interest_4) {
                        $update_pelamar_passed4 = Loker::where('id_iklan', $request->id_iklan)->where('no_rcr', $request->job_interest_4)->first();
                        $update_pelamar_passed4->actual_pass_fresh = $jml_actual_pass_fresh4;
                        $update_pelamar_passed4->save();
                    }
                    //-- end update actual pass fresh


                } elseif ($pelamar->status_pelamar == "Awaiting") {

                    //-- update awaiting fresh
                    $jml_awaiting_fresh1 = $awaiting_fresh1 + 1;
                    $jml_awaiting_fresh2 = $awaiting_fresh2 + 1;
                    $jml_awaiting_fresh3 = $awaiting_fresh3 + 1;
                    $jml_awaiting_fresh4 = $awaiting_fresh4 + 1;

                    //update jumlah awaiting
                    if ($request->job_interest_1) {
                        $update_pelamar_awaiting1 = Loker::where('id_iklan', $request->id_iklan)->where('no_rcr', $request->job_interest_1)->first();
                        $update_pelamar_awaiting1->awaiting_fresh = $jml_awaiting_fresh1;
                        $update_pelamar_awaiting1->save();
                    }

                    if ($request->job_interest_2) {
                        $update_pelamar_awaiting2 = Loker::where('id_iklan', $request->id_iklan)->where('no_rcr', $request->job_interest_2)->first();
                        $update_pelamar_awaiting2->awaiting_fresh = $jml_awaiting_fresh2;
                        $update_pelamar_awaiting2->save();
                    }

                    if ($request->job_interest_3) {
                        $update_pelamar_awaiting3 = Loker::where('id_iklan', $request->id_iklan)->where('no_rcr', $request->job_interest_3)->first();
                        $update_pelamar_awaiting3->awaiting_fresh = $jml_awaiting_fresh3;
                        $update_pelamar_awaiting3->save();
                    }

                    if ($request->job_interest_4) {
                        $update_pelamar_awaiting4 = Loker::where('id_iklan', $request->id_iklan)->where('no_rcr', $request->job_interest_4)->first();
                        $update_pelamar_awaiting4->awaiting_fresh = $jml_awaiting_fresh4;
                        $update_pelamar_awaiting4->save();
                    }
                    //-- end update awaiting fresh
                }

                //Experience
            } else {

                // -- update actual exp
                $jml_actual_exp1 = $actual_exp1 + 1;
                $jml_actual_exp2 = $actual_exp2 + 1;
                $jml_actual_exp3 = $actual_exp3 + 1;
                $jml_actual_exp4 = $actual_exp4 + 1;


                if ($request->job_interest_1) {
                    $update_pelamar_passed1 = Loker::where('id_iklan', $request->id_iklan)->where('no_rcr', $request->job_interest_1)->first();
                    $update_pelamar_passed1->actual_exp = $jml_actual_exp1;
                    $update_pelamar_passed1->save();
                }

                if ($request->job_interest_2) {
                    $update_pelamar_passed2 = Loker::where('id_iklan', $request->id_iklan)->where('no_rcr', $request->job_interest_2)->first();
                    $update_pelamar_passed2->actual_exp = $jml_actual_exp2;
                    $update_pelamar_passed2->save();
                }

                if ($request->job_interest_3) {
                    $update_pelamar_passed3 = Loker::where('id_iklan', $request->id_iklan)->where('no_rcr', $request->job_interest_3)->first();
                    $update_pelamar_passed3->actual_exp = $jml_actual_exp3;
                    $update_pelamar_passed3->save();
                }

                if ($request->job_interest_4) {
                    $update_pelamar_passed4 = Loker::where('id_iklan', $request->id_iklan)->where('no_rcr', $request->job_interest_4)->first();
                    $update_pelamar_passed4->actual_exp = $jml_actual_exp4;
                    $update_pelamar_passed4->save();
                }
                // -- end update actual exp

                if ($level == "S1") {

                    if ($lama_studi <= 5 and $akreditasi == "A" and $request->gpa >= 2.75 and $usia <= 45) {

                        $pelamar->status_pelamar = "Passed";
                        $pelamar->keterangan = "actual_exp";

                    } elseif ($lama_studi <= 5 and $akreditasi == "B" and $request->gpa >= 3 and $usia <= 45) {

                        $pelamar->status_pelamar = "Passed";
                        $pelamar->keterangan = "actual_exp";

                    } elseif ($lama_studi <= 5 and $request->gpa >= 3 and $usia <= 45) {

                        $pelamar->status_pelamar = "Awaiting";
                        $pelamar->keterangan = "awaiting_fresh";

                    } else {

                        $pelamar->status_pelamar = "Failed";
                        $pelamar->keterangan = "failed_exp";
                    }

                } elseif ($level == "D3") {

                    if ($lama_studi <= 3 and $akreditasi == "A" and $request->gpa >= 2.75 and $usia <= 45) {

                        $pelamar->status_pelamar = "Passed";
                        $pelamar->keterangan = "actual_exp";

                    } elseif ($lama_studi <= 3 and $akreditasi == "B" and $request->gpa >= 3 and $usia <= 45) {

                        $pelamar->status_pelamar = "Passed";
                        $pelamar->keterangan = "actual_exp";

                    } elseif ($lama_studi <= 3 and $request->gpa >= 3 and $usia <= 45) {

                        $pelamar->status_pelamar = "Awaiting";
                        $pelamar->keterangan = "awaiting_exp";

                    } else {

                        $pelamar->status_pelamar = "Failed";
                        $pelamar->keterangan = "failed_exp";
                    }

                } elseif ($level == "D4") {

                    if ($lama_studi <= 4 and $akreditasi == "A" and $request->gpa >= 2.75 and $usia <= 45) {

                        $pelamar->status_pelamar = "Passed";
                        $pelamar->keterangan = "actual_exp";

                    } elseif ($lama_studi <= 4 and $akreditasi == "B" and $request->gpa >= 3 and $usia <= 45) {

                        $pelamar->status_pelamar = "Passed";
                        $pelamar->keterangan = "actual_exp";

                    } elseif ($lama_studi <= 4 and $request->gpa >= 3 and $usia <= 45) {

                        $pelamar->status_pelamar = "Awaiting";
                        $pelamar->keterangan = "awaiting_exp";

                    } else {

                        $pelamar->status_pelamar = "Failed";
                        $pelamar->keterangan = "failed_exp";
                    }
                }

                if ($pelamar->status_pelamar == "Passed") {


                    //-- update kuota psychotest
                    $id_tgl_psychotest = $request->id_tanggal_psychotest;
                    $get_psychotest = TanggalPsychotest::where('id',$id_tgl_psychotest)->first();
                    $current_kuota = $get_psychotest->kuota;
                    $min_kuota = $current_kuota-1;

                    $update_tgl_psychotest = TanggalPsychotest::where('id',$id_tgl_psychotest)->first();
                    $update_tgl_psychotest->kuota = $min_kuota;
                    $update_tgl_psychotest->save();
                    //-- end update kuota psychotest

                    //-- update actual pass exp
                    $jml_actual_pass_exp1 = $actual_pass_exp1 + 1;
                    $jml_actual_pass_exp2 = $actual_pass_exp2 + 1;
                    $jml_actual_pass_exp3 = $actual_pass_exp3 + 1;
                    $jml_actual_pass_exp4 = $actual_pass_exp4 + 1;
                    if ($request->job_interest_1) {
                        $update_pelamar_passed1 = Loker::where('id_iklan', $request->id_iklan)->where('no_rcr', $request->job_interest_1)->first();
                        $update_pelamar_passed1->actual_pass_exp = $jml_actual_pass_exp1;
                        $update_pelamar_passed1->save();
                    }

                    if ($request->job_interest_2) {
                        $update_pelamar_passed2 = Loker::where('id_iklan', $request->id_iklan)->where('no_rcr', $request->job_interest_2)->first();
                        $update_pelamar_passed2->actual_pass_exp = $jml_actual_pass_exp2;
                        $update_pelamar_passed2->save();
                    }

                    if ($request->job_interest_3) {
                        $update_pelamar_passed3 = Loker::where('id_iklan', $request->id_iklan)->where('no_rcr', $request->job_interest_3)->first();
                        $update_pelamar_passed3->actual_pass_exp = $jml_actual_pass_exp3;
                        $update_pelamar_passed3->save();
                    }

                    if ($request->job_interest_4) {
                        $update_pelamar_passed4 = Loker::where('id_iklan', $request->id_iklan)->where('no_rcr', $request->job_interest_4)->first();
                        $update_pelamar_passed4->actual_pass_exp = $jml_actual_pass_exp4;
                        $update_pelamar_passed4->save();
                    }
                    //-- end update actual pass exp
                } elseif ($pelamar->status_pelamar == "Awaiting") {

                    $jml_awaiting_exp_1 = $awaiting_exp1 + 1;
                    $jml_awaiting_exp_2 = $awaiting_exp2 + 1;
                    $jml_awaiting_exp_3 = $awaiting_exp3 + 1;
                    $jml_awaiting_exp_4 = $awaiting_exp4 + 1;

                    // DB::table('loker')->where('id_iklan', $request->id_iklan)->where('no_rcr', $request->job_interest_1)->update(['awaiting_exp' => $jml_awaiting_exp_1]);
                    // DB::table('loker')->where('id_iklan', $request->id_iklan)->where('no_rcr', $request->job_interest_2)->update(['awaiting_exp' => $jml_awaiting_exp_2]);
                    // DB::table('loker')->where('id_iklan', $request->id_iklan)->where('no_rcr', $request->job_interest_3)->update(['awaiting_exp' => $jml_awaiting_exp_3]);
                    // DB::table('loker')->where('id_iklan', $request->id_iklan)->where('no_rcr', $request->job_interest_4)->update(['awaiting_exp' => $jml_awaiting_exp_4]);

                    if ($request->job_interest_1) {
                        $update_pelamar_awaiting1 = Loker::where('id_iklan', $request->id_iklan)->where('no_rcr', $request->job_interest_1)->first();
                        $update_pelamar_awaiting1->awaiting_exp = $jml_awaiting_exp_1;
                        $update_pelamar_awaiting1->save();
                    }

                    if ($request->job_interest_2) {
                        $update_pelamar_awaiting2 = Loker::where('id_iklan', $request->id_iklan)->where('no_rcr', $request->job_interest_2)->first();
                        $update_pelamar_awaiting2->awaiting_exp = $jml_awaiting_exp_2;
                        $update_pelamar_awaiting2->save();
                    }

                    if ($request->job_interest_3) {
                        $update_pelamar_awaiting3 = Loker::where('id_iklan', $request->id_iklan)->where('no_rcr', $request->job_interest_3)->first();
                        $update_pelamar_awaiting3->awaiting_exp = $jml_awaiting_exp_3;
                        $update_pelamar_awaiting3->save();
                    }

                    if ($request->job_interest_4) {
                        $update_pelamar_awaiting4 = Loker::where('id_iklan', $request->id_iklan)->where('no_rcr', $request->job_interest_4)->first();
                        $update_pelamar_awaiting4->awaiting_exp = $jml_awaiting_exp_4;
                        $update_pelamar_awaiting4->save();
                    }
                }
            }

            $pelamar->ip_address = $request->ip();
            $pelamar->browser = $request->header('User-Agent');
            $pelamar->save();

            // Insert Detail education background
            $detail_edu = new DetailEducation;
            $detail_edu->id_pelamar = $pelamar->id;
            $detail_edu->id_tingkat_pendidikan_1 = $request->id_tingkat_pendidikan;
            $detail_edu->id_institusi_1 = $request->id_institusi;
            $detail_edu->other_institusi_1 = $request->other_institusi;
            $detail_edu->id_major_1 = $request->id_major;
            $detail_edu->other_major_1 = $request->other_major;
            $detail_edu->gpa_1 = $request->gpa;
            $detail_edu->start_year_1 = $request->start_year_education;
            $detail_edu->end_year_1 = $request->end_year_education;
            $detail_edu->id_tingkat_pendidikan_2 = $request->id_tingkat_pendidikan_more;
            $detail_edu->id_institusi_2 = $request->id_institusi_more;
            $detail_edu->other_institusi_2 = $request->other_institusi_more;
            $detail_edu->id_major_2 = $request->id_major_more;
            $detail_edu->other_major_2 = $request->other_major_more;
            $detail_edu->gpa_2 = $request->gpa_more;
            if ($request->id_tingkat_pendidikan_more == "") {

                $detail_edu->start_year_2 = "";
                $detail_edu->end_year_2 = "";
            } else {
                $detail_edu->start_year_2 = $request->start_year_education_more;
                $detail_edu->end_year_2 = $request->end_year_education_more;
            }
            $detail_edu->save();

            // Insert Detail work experience
            if (!empty($request->id_bidang_usaha)) {

                $detail_we = new DetailWorkExperience;
                $detail_we->id_pelamar = $pelamar->id;
                $detail_we->id_bidang_usaha_1 = $request->id_bidang_usaha;
                $detail_we->other_bidang_usaha_1 = $request->other_bidang_usaha;
                $detail_we->start_year_1 = $request->we_start_month . " " . $request->we_start_year;
                $detail_we->end_year_1 = $request->we_end_month . " " . $request->we_end_year;
                $detail_we->id_bidang_usaha_2 = $request->more_id_bidang_usaha0;
                $detail_we->other_bidang_usaha_2 = $request->more_other_bidang_usaha0;
                $detail_we->start_year_2 = $request->more_we_start_month0 . " " . $request->more_we_start_year0;
                $detail_we->end_year_2 = $request->more_we_end_month0 . " " . $request->more_we_end_year0;
                $detail_we->id_bidang_usaha_3 = $request->more_id_bidang_usaha1;
                $detail_we->other_bidang_usaha_3 = $request->more_other_bidang_usaha1;
                $detail_we->start_year_3 = $request->more_we_start_month1 . " " . $request->more_we_start_year1;
                $detail_we->end_year_3 = $request->more_we_end_month1 . " " . $request->more_we_end_year1;
                $detail_we->id_bidang_usaha_4 = $request->more_id_bidang_usaha2;
                $detail_we->other_bidang_usaha_4 = $request->more_other_bidang_usaha2;
                $detail_we->start_year_4 = $request->more_we_start_month2 . " " . $request->more_we_start_year2;
                $detail_we->end_year_4 = $request->more_we_end_month2 . " " . $request->more_we_end_year2;
                $detail_we->save();

            }

            return redirect('/')->with('message', 'Terima kasih, Data berhasil disimpan!');

        }

    }
}
