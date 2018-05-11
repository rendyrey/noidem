<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\SyaratPsychotest;
use App\SyaratPrescreening;
use App\TestType;
use App\Major;
use App\Posisi;
use App\TingkatPendidikan;

class KriteriaSyaratController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

      $data['kriteria_syarat'] = SyaratPsychotest::all();
      return view('admin.kriteria_syarat.index',$data);
    }

    public function syarat_psychotest(){
      $data['syarat_psychotest_umum'] = SyaratPsychotest::where('type','umum')->get();
      $data['syarat_psychotest_khusus'] = SyaratPsychotest::where('type','khusus')->get();
      $data['test_type_opt'] = TestType::all()->lists('test_type','id');
      $data['major_opt'] = Major::orderBy('major','asc')->lists('major','id');
      $data['position_category_opt'] = ['Lapangan','Pusat'];
      $data['position_opt'] = Posisi::orderBy('posisi','asc')->lists('posisi','id');
      return view('admin.kriteria_syarat.syarat_psychotest',$data);
    }

    public function tambah_syarat_psychotest(Request $request){
      $this->validate($request,[
        'position_category'=>'required',
        'test_type'=>'required',
        'test_score'=>'required'
      ]);
      $syarat_psychotest = new SyaratPsychotest;
      $syarat_psychotest->position_category = $request->position_category;
      $syarat_psychotest->test_type = $request->test_type;
      $syarat_psychotest->test_score = $request->test_score;
      $syarat_psychotest->type = "umum";
      $syarat_psychotest->position = "-";
      $syarat_psychotest->major = "-";
      $syarat_psychotest->save();


    	return redirect('syarat_psychotest')->with('message', 'Data Berhasil Disimpan !')->with('panel','success');

    }
    public function tambah_syarat_psychotest_khusus(Request $request){
      $this->validate($request,[
        'position'=>'required',
        'major'=>'required',
        'test_type'=>'required',
        'test_score'=>'required|numeric'
      ]);
      $syarat_psychotest = new SyaratPsychotest;
      $syarat_psychotest->position_category = "-";
      $syarat_psychotest->position = $request->position;
      $syarat_psychotest->major = $request->major;
      $syarat_psychotest->test_type = $request->test_type;
      $syarat_psychotest->test_score = $request->test_score;
      $syarat_psychotest->type = "khusus";
      $syarat_psychotest->save();


    	return redirect('syarat_psychotest')->with('message', 'Data Berhasil Disimpan !')->with('panel','success');

    }

    public function syarat_psychotest_edit($id){
      $data['syarat_psychotest'] = SyaratPsychotest::find($id);
      $data['test_type_opt'] = TestType::all()->lists('test_type','id');
      $data['position_category_opt'] = ['Lapangan','Pusat'];
      return view('admin.kriteria_syarat.syarat_psychotest_edit',$data);
    }
    
    public function syarat_psychotest_edit_khusus($id){
      $data['syarat_psychotest'] = SyaratPsychotest::find($id);
      $data['test_type_opt'] = TestType::all()->lists('test_type','id');
      $data['position_opt'] = Posisi::orderBy('posisi','asc')->lists('posisi','id');
      $data['major_opt'] = Major::orderBy('major','asc')->lists('major','id');
      return view('admin.kriteria_syarat.syarat_psychotest_edit_khusus',$data);
    }


    public function syarat_psychotest_update(Request $request,$id){
      $this->validate($request,[
        'position_category'=>'required',
        'test_type'=>'required',
        'test_score'=>'required|numeric'
      ]);
      $update = SyaratPsychotest::find($id);
      $update->position_category = $request->position_category;
      $update->test_type = $request->test_type;
      $update->test_score = $request->test_score;
      $update->save();
      return redirect('syarat_psychotest')->with('message', 'Data berhasil diubah!')->with('panel','success');

    }

    public function syarat_psychotest_update_khusus(Request $request,$id){
      $this->validate($request,[
        'position'=>'required',
        'major'=>'required',
        'test_type'=>'required',
        'test_score'=>'required'
      ]);
      $update = SyaratPsychotest::find($id);
      $update->position = $request->position;
      $update->major = $request->major;
      $update->test_type = $request->test_type;
      $update->test_score = $request->test_score;
      $update->save();
      return redirect('syarat_psychotest')->with('message', 'Data berhasil diubah!')->with('panel','success');

    }

    public function syarat_psychotest_delete($id){
      SyaratPsychotest::find($id)->delete();
      return redirect('syarat_psychotest')->with('message','Data berhasil dihapus!')->with('panel','success');
    }

    public function syarat_prescreening(){
      $data['syarat_prescreening_umum'] = SyaratPrescreening::where('type','umum')->get();
      $data['syarat_prescreening_khusus'] = SyaratPrescreening::where('type','khusus')->get();
      $data['edu_level_opt'] = TingkatPendidikan::all()->lists('tingkat','id');
      $data['major_opt'] = Major::orderBy('major','asc')->lists('major','id');
      $data['is_active_opt'] = ['1','0'];
      return view('admin.kriteria_syarat.syarat_prescreening',$data);
    }

    public function tambah_syarat_prescreening(Request $request){
      $this->validate($request,[
        'position_category'=>'required',
        'work_experience'=>'required',
        'id_tingkat_pendidikan'=>'required',
        'accreditation'=>'required',
        'gpa'=>'required|regex:/^[0-4]\.?[0-9]{0,2}$/',
        'study_period'=>'required|regex:/^[0-9]{1,2}\.?[5]?$/',
        'age'=>'required|regex:/^[0-9]{0,2}$/'
      ]);
      $syarat = new SyaratPrescreening;
      $syarat->position_category = $request->position_category;
      $syarat->work_experience = $request->work_experience;
      $syarat->id_tingkat_pendidikan = $request->id_tingkat_pendidikan;
      $syarat->accreditation = $request->accreditation;
      $syarat->gpa = $request->gpa;
      $syarat->study_period = $request->study_period;
      $syarat->age = $request->age;
      $syarat->type = "umum";
      $syarat->id_major = "0";
      $syarat->is_active = "0";
      $syarat->save();
      return redirect('syarat_prescreening')->with('message','Data berhasil disimpan!')->with('panel','success');
    }

    public function tambah_syarat_prescreening_khusus(Request $request){
      $this->validate($request,[
        'position_category'=>'required',
        'id_major'=>'required',
        'id_tingkat_pendidikan'=>'required',
        'accreditation'=>'required',
        'gpa'=>'required|regex:/^[0-4]\.?[0-9]{0,2}$/',
        'study_period'=>'required|regex:/^[0-9]{1,2}\.?[5]?$/',
        'age'=>'required|regex:/^[0-9]{0,2}$/',
        'is_active'=>'required'
      ]);
      $syarat = new SyaratPrescreening;
      $syarat->position_category = $request->position_category;
      $syarat->id_major = $request->id_major;
      $syarat->id_tingkat_pendidikan = $request->id_tingkat_pendidikan;
      $syarat->gpa = $request->gpa;
      $syarat->accreditation = $request->accreditation;
      $syarat->study_period = $request->study_period;
      $syarat->age = $request->age;
      $syarat->is_active = $request->is_active;
      $syarat->work_experience = "-";
      $syarat->type = "khusus";
      $syarat->save();
      return redirect('syarat_prescreening')->with('message','Data berhasil disimpan!')->with('panel','success');
    }

    public function syarat_prescreening_delete($id){
      SyaratPrescreening::find($id)->delete();
      return redirect('syarat_prescreening')->with('message','Data berhasil dihapus!')->with('panel','success');
    }

    public function syarat_prescreening_edit($id){
      $data['syarat_prescreening'] = SyaratPrescreening::find($id);
      $data['edu_level_opt'] = TingkatPendidikan::all()->lists('tingkat','id');
      $data['accreditation_opt'] = ['A','B','C'];
      $data['work_exp_opt'] = ['Yes','No'];
      $data['position_category_opt'] = ['Lapangan','Pusat'];
      return view('admin.kriteria_syarat.syarat_prescreening_edit',$data);
    }

    public function syarat_prescreening_edit_khusus($id){
      $data['syarat_prescreening'] = SyaratPrescreening::find($id);
      $data['edu_level_opt'] = TingkatPendidikan::all()->lists('tingkat','id');
      $data['accreditation_opt'] = ['A','B','C'];
      $data['position_category_opt'] = ['Lapangan','Pusat'];
      $data['is_active_opt'] = ['1','0'];
      $data['major_opt'] = Major::orderBy('major','asc')->lists('major','id');
      return view('admin.kriteria_syarat.syarat_prescreening_edit_khusus',$data);
    }

    public function syarat_prescreening_update(Request $request,$id){
      $this->validate($request,[
        'position_category'=>'required',
        'work_experience'=>'required',
        'id_tingkat_pendidikan'=>'required',
        'accreditation'=>'required',
        'gpa'=>'required|regex:/^[0-4]\.?[0-9]{0,2}$/',
        'study_period'=>'required|regex:/^[0-9]{1,2}\.?[5]?$/',
        'age'=>'required|regex:/^[0-9]{0,2}$/'
      ]);
      $update = SyaratPrescreening::find($id);
      $update->position_category = $request->position_category;
      $update->work_experience = $request->work_experience;
      $update->id_tingkat_pendidikan = $request->id_tingkat_pendidikan;
      $update->accreditation = $request->accreditation;
      $update->gpa = $request->gpa;
      $update->study_period = $request->study_period;
      $update->age = $request->age;
      $update->save();
      return redirect('syarat_prescreening')->with('message','Data berhasil dirubah')->with('panel','success');

    }

    public function syarat_prescreening_update_khusus(Request $request,$id){
      $this->validate($request,[
        'position_category'=>'required',
        'id_major'=>'required',
        'id_tingkat_pendidikan'=>'required',
        'accreditation'=>'required',
        'gpa'=>'required|regex:/^[0-4]\.?[0-9]{0,2}$/',
        'study_period'=>'required|regex:/^[0-9]\.?[5]?$/',
        'age'=>'required|regex:/^[0-9]{0,2}$/',
        'is_active'=>'required'
      ]);
      $update = SyaratPrescreening::find($id);
      $update->position_category = $request->position_category;
      $update->id_major = $request->id_major;
      $update->id_tingkat_pendidikan = $request->id_tingkat_pendidikan;
      $update->accreditation = $request->accreditation;
      $update->gpa = $request->gpa;
      $update->study_period = $request->study_period;
      $update->age = $request->age;
      $update->is_active = $request->is_active;
      $update->save();
      return redirect('syarat_prescreening')->with('message','Data berhasil dirubah')->with('panel','success');
    }
  }

    



