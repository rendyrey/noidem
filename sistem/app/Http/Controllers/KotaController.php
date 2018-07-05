<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\KotaRequest;
use App\Kota;
use App\Provinsi;
use App\Http\Requests;
use DB;
use Excel;

class KotaController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

	public function index()
	{
		$kota = Kota::all();
		$provinsi = Provinsi::orderBy('province','asc')->lists('province','id');
    	return view('admin.kota.index', compact('kota','provinsi'));
	}

	public function tambah(KotaRequest $request)
	{
		$kota = $request->kota;
		$id_provinsi = $request->id_provinsi;
		DB::table('kota')->insert(['kota' => $kota, 'id_provinsi' => $id_provinsi]);
		return redirect('kota')->with('message', 'Data Berhasil Disimpan !')->with('panel','success');
	}

	public function edit($id)
	{
		$kota = Kota::findOrfail($id);
		$provinsi = Provinsi::orderBy('province','asc')->lists('province','id');
    	return view('admin.kota.edit', compact('kota','provinsi'));
	}

	public function update($id, KotaRequest $request)
	{
		$kota = $request->kota;
		$id_provinsi = $request->id_provinsi;
		DB::table('kota')->where('id', $id)->update(['kota' => $kota, 'id_provinsi' => $id_provinsi]);
    	return redirect('kota')->with('message', 'Data berhasil diubah!')->with('panel','success');
	}

	public function export_kota(){
		$data = Kota::all();
		$items = array();
		foreach($data as $key=>$value){
			$items[$key]['no'] = ++$key;
			$items[$key]['id_provinsi'] = $value->id_provinsi;
			$items[$key]['provinsi'] = $value->provinsi->province;
			$items[$key]['kota'] = $value->kota;
		}
		Excel::create('Kota '.date('Y-m-d'),function($excel) use($items){
			$excel->sheet('Sheet 1',function($sheet) use ($items){
				$sheet->fromArray($items);
			});
		})->export('xls');
	}

	public function import_kota(Request $request){
		$this->validate($request,[
			'file' => 'required'
		]);

		if($request->file('file')){
			$path = $request->file('file')->path();
			$data = Excel::load($path,function($reader){
			})->get();
			if(!empty($data) && $data->count()){
				if(!isset($data[0]['kota'])){
					return redirect('kota')->with('message','Data gagal disimpan, periksa kembali file')->with('panel','danger');
				}
				$new_record = 0;
				foreach($data as $key => $value){
					// $insert[] = ['bidang_usaha'=>$value->bidang_usaha];
					if(!empty($value)){
						//check sudah ada atau belum
						if(!Kota::where('kota',$value->kota)->first()){
							$new_line = new Kota();
							$new_line->id_provinsi = $value->id_province;
							$new_line->kota = $value->kota;
							$new_line->save();
							$new_record++;
						}
					}
				}
			}
			return redirect('kota')->with('message','Data berhasil disimpan! '.$new_record.' new entries')->with('panel','success');
		}
	}
}
