<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MajorGrupRequest;
use App\MajorGrup;
use App\Http\Requests;
use DB;
use Excel;

class MajorGrupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$major_grup = MajorGrup::all();
    	return view('admin.major_grup.index', compact('major_grup'));
    }

    public function tambah(MajorGrupRequest $request)
    {
    	$kode = $request->kode;
    	$nama_grup = $request->nama_grup;
    	DB::table('major_grup')->insert(['kode' => $kode, 'nama_grup' => $nama_grup]);
    	return redirect('major_grup')->with('message', 'Data Berhasil Disimpan !')->with('panel','success');
    }

    public function edit($id)
    {
    	$major_grup = MajorGrup::findOrfail($id);
    	return view('admin.major_grup.edit', compact('major_grup'));
    }

    public function update($id, MajorGrupRequest $request)
    {
    	$kode = $request->kode;
    	$nama_grup = $request->nama_grup;
    	DB::table('major_grup')->where('id', $id)->update(['kode' => $kode, 'nama_grup' => $nama_grup]);
    	return redirect('major_grup')->with('message', 'Data berhasil diubah!')->with('panel','success');
    }

    public function export_major_grup(){
      $data = MajorGrup::all();
      $items = array();
      foreach($data as $key=>$value){
        $items[$key]['no'] = ++$key;
        $items[$key]['kode'] = $value->kode;
        $items[$key]['nama_grup'] = $value->nama_grup;
      }
      Excel::create('Major Grup '.date('Y-m-d'),function($excel) use($items){
        $excel->sheet('Sheet 1',function($sheet) use ($items){
          $sheet->fromArray($items);
        });
      })->export('xls');
    }

    public function import_major_grup(Request $request){
      $this->validate($request,[
  			'file' => 'required'
  		]);

  		if($request->file('file')){
  			$path = $request->file('file')->path();
  			$data = Excel::load($path,function($reader){
  			})->get();
  			if(!empty($data) && $data->count()){
  				if(!isset($data[0]['nama_grup'])){
  					return redirect('major_grup')->with('message','Data gagal disimpan, periksa kembali file')->with('panel','danger');
  				}
  				$new_record = 0;
  				foreach($data as $key => $value){
  					// $insert[] = ['bidang_usaha'=>$value->bidang_usaha];
  					if(!empty($value)){
  						//check sudah ada atau belum
  						if(!MajorGrup::where('kode',$value->kode)->first()){
  							$new_line = new MajorGrup();
  							$new_line->kode = $value->kode;
  							$new_line->nama_grup = $value->nama_grup;
  							$new_line->save();
  							$new_record++;
  						}
  					}
  				}
  			}
  			return redirect('major_grup')->with('message','Data berhasil disimpan! '.$new_record.' new entries')->with('panel','success');
  		}
    }
}
