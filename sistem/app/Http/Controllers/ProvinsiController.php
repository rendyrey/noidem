<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProvinsiRequest;
use App\Provinsi;
use App\Http\Requests;
use DB;
use Input;
use Excel;

class ProvinsiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$provinsi = Provinsi::all();
    	return view('admin.provinsi.index', compact('provinsi'));
    }

    public function tambah(ProvinsiRequest $request)
    {
    	$provinsi = $request->provinsi;
    	DB::table('provinsi')->insert(['province' => $provinsi]);
        return redirect('provinsi')->with('message', 'Data Berhasil Disimpan !')->with('panel','success');
    }

    public function edit($id)
    {
    	$provinsi = Provinsi::findOrfail($id);
    	return view('admin.provinsi.edit', compact('provinsi'));
    }

    public function update($id, ProvinsiRequest $request)
    {
    	$provinsi = $request->provinsi;
    	DB::table('provinsi')->where('id', $id)->update(['province' => $provinsi]);
    	return redirect('provinsi')->with('message', 'Data berhasil diubah!')->with('panel','success');
    }

    // public function hapus($id)
    // {
    //     $provinsi = Provinsi::findOrfail($id);
    //     $provinsi->delete();
    //     $provinsi->kota()->delete();
    //     return redirect('provinsi')->with('messages', 'Data berhasil dihapus!');
    // }

    public function export_provinsi(){
      $data = Provinsi::all();
      $items = array();
      foreach($data as $key=>$value){
        $items[$key]['no'] = ++$key;
        $items[$key]['province'] = $value->province;
      }
      Excel::create('Provinsi '.date('Y-m-d'),function($excel) use($items){
        $excel->sheet('Sheet 1',function($sheet) use ($items){
          $sheet->fromArray($items);
        });
      })->export('xls');
    }

    public function import_provinsi(Request $request  ){
      $this->validate($request,[
        'file' => 'required'
      ]);

      if($request->file('file')){
        $path = $request->file('file')->path();
        $data = Excel::load($path,function($reader){
        })->get();
        if(!empty($data) && $data->count()){
          if(!isset($data[0]['province'])){
            return redirect('provinsi')->with('message','Data gagal disimpan!, periksa kembali file')->with('panel','danger');
          }
          $new_record = 0;
          foreach($data as $key => $value){
            // $insert[] = ['bidang_usaha'=>$value->bidang_usaha];
            if(!empty($value)){
              //check sudah ada atau belum
              if(!Provinsi::where('province',$value->province)->first()){
                $new_line = new Provinsi();
                $new_line->province = $value->province;
                $new_line->save();
                $new_record++;
              }
            }
          }
        }
        return redirect('provinsi')->with('message','Data berhasil disimpan! '.$new_record.' new entries')->with('panel','success');
      }
    }
}
