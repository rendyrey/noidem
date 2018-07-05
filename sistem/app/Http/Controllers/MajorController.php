<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MajorRequest;
use App\MajorGrup;
use App\Major;
use App\Http\Requests;
use DB;
use Carbon\Carbon;
use Excel;

class MajorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$major = Major::all();
    	$major_grup = MajorGrup::all()->lists('nama_grup','id');
    	return view('admin.major.index', compact('major','major_grup'));
    }

    public function tambah(MajorRequest $request)
    {
        $major = new Major;
    	$major->kode_major = $request->kode_major;
    	$major->major = $request->major;
    	$major->id_grup = $request->id_grup;
        $major->created_at = Carbon::now();
        $major->save();

    	return redirect('major')->with('message', 'Data Berhasil Disimpan !')->with('panel','success');
    }

    public function edit($id)
    {
    	$major = Major::findOrfail($id);
    	$major_grup = MajorGrup::all()->lists('nama_grup','id');
    	return view('admin.major.edit', compact('major','major_grup'));
    }

    public function update($id, MajorRequest $request)
    {
    	$kode_major = $request->kode_major;
    	$major = $request->major;
    	$id_grup = $request->id_grup;
    	DB::table('major')->where('id', $id)->update(['kode_major' => $kode_major, 'major' => $major, 'id_grup' => $id_grup]);
    	return redirect('major')->with('message', 'Data berhasil diubah')->with('panel','success');
    }

    public function export_major(){
      $data = Major::all();
      $items = array();
      foreach($data as $key=>$value){
        $items[$key]['no'] = ++$key;
        $items[$key]['id_grup'] = $value->id_grup;
        $items[$key]['nama_grup'] = $value->major_grup->nama_grup;
        $items[$key]['kode_major'] = $value->kode_major;
        $items[$key]['major'] = $value->major;
      }
      Excel::create('Major '.date('Y-m-d'),function($excel) use($items){
        $excel->sheet('Sheet 1',function($sheet) use ($items){
          $sheet->fromArray($items);
        });
      })->export('xls');
    }

    public function import_major(Request $request){
      $this->validate($request,[
  			'file' => 'required'
  		]);

  		if($request->file('file')){
  			$path = $request->file('file')->path();
  			$data = Excel::load($path,function($reader){
  			})->get();
  			if(!empty($data) && $data->count()){
  				if(!isset($data[0]['major'])){
  					return redirect('major')->with('message','Data gagal disimpan, periksa kembali file')->with('panel','danger');
  				}
  				$new_record = 0;
  				foreach($data as $key => $value){
  					// $insert[] = ['bidang_usaha'=>$value->bidang_usaha];
  					if(!empty($value)){
  						//check sudah ada atau belum
  						if(!Major::where('major',$value->major)->first()){
  							$new_line = new Major();
  							$new_line->id_grup = $value->id_grup;
  							$new_line->kode_major = $value->kode_major;
                $new_line->major = $value->major;
  							$new_line->save();
  							$new_record++;
  						}
  					}
  				}
  			}
  			return redirect('major')->with('message','Data berhasil disimpan! '.$new_record.' new entries')->with('panel','success');
  		}
    }
}
