<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\InstitusiRequest;
use App\Institusi;
use App\Kota;
use App\Provinsi;
use App\Http\Requests;
use Carbon\Carbon;
use Input;
use Excel;
use DB;

class InstitusiController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $institusi = Institusi::all();
    $provinsi = Provinsi::orderBy('province','asc')->get();
    $kota = Kota::orderBy('kota','asc')->get();
    return view('admin.institusi.index', compact('institusi','provinsi','kota'));
  }

  public function tambah(InstitusiRequest $request)
  {
    $nama_institusi = $request->nama_institusi;
    $singkatan = $request->singkatan;
    $id_provinsi = $request->id_provinsi;
    $id_kota = $request->id_kota;
    DB::table('institusi')->insert(['nama_institusi' => $nama_institusi, 'singkatan' => $singkatan, 'id_provinsi' => $id_provinsi, 'id_kota' => $id_kota]);
    return redirect('institusi')->with('message', 'Data Berhasil Disimpan !')->with('panel','success');
  }

  public function edit($id)
  {
    $institusi = Institusi::findOrfail($id);
    $provinsi = Provinsi::orderBy('province','asc')->lists('province','id');
    $kota = Kota::orderBy('kota','asc')->lists('kota','id');
    return view('admin.institusi.edit', compact('institusi','provinsi','kota'));
  }

  public function update($id, InstitusiRequest $request)
  {
    $nama_institusi = $request->nama_institusi;
    $singkatan = $request->singkatan;
    $id_provinsi = $request->id_provinsi;
    $id_kota= $request->id_kota;
    DB::table('institusi')->where('id', $id)->update(['nama_institusi' => $nama_institusi, 'singkatan' => $singkatan, 'id_provinsi' => $id_provinsi, 'id_kota' => $id_kota ]);
    return redirect('institusi')->with('message', 'Data berhasil diubah!')->with('panel','success');
  }

  public function import()
  {
    $now = Carbon::now();
    if(Input::hasFile('import_institusi')){
      $path = Input::file('import_institusi')->getRealPath();
      $data = Excel::load($path, function($reader) {
      })->get();

      if(!empty($data) && $data->count()){
        foreach ($data as $key => $value) {
          $insert[] = ['id_provinsi' => $value->id_provinsi, 'id_kota' => $value->id_kota, 'nama_institusi' => $value->nama_institusi, 'singkatan' => $value->singkatan, 'created_at' => $now, 'updated_at' => $now];
        }

        if(!empty($insert)){
          DB::table('institusi')->insert($insert);
          return redirect('import')->with('message', 'Data pegawai berhasil diimport !');
        }else{
          return redirect('import')->with('message', 'Data pegawai GAGAL diimport, perikasa kembali format dalam file *xls !');
        }
      }
    }
    return back();
  }

  public function export_institusi(){
    $data = Institusi::all();
    $items = array();
    foreach($data as $key=>$value){
      $items[$key]['no'] = ++$key;
      $items[$key]['id_provinsi'] = $value->id_provinsi;
      $items[$key]['provinsi'] = $value->provinsi->province;
      $items[$key]['id_kota'] = $value->id_kota;
      $items[$key]['kota'] = $value->kota->kota;
      $items[$key]['nama_institusi'] = $value->nama_institusi;
      $items[$key]['singkatan'] = $value->singkatan;
    }
    Excel::create('Institusi '.date('Y-m-d'),function($excel) use($items){
      $excel->sheet('Sheet 1',function($sheet) use ($items){
        $sheet->fromArray($items);
      });
    })->export('xls');
  }

  public function import_institusi(Request $request){
    $this->validate($request,[
      'file' => 'required'
    ]);

    if($request->file('file')){
      $path = $request->file('file')->path();
      $data = Excel::load($path,function($reader){
      })->get();

      if(!empty($data) && $data->count()){
        if(!isset($data[0]['nama_institusi'])){
          return redirect('institusi')->with('message','Data gagal disimpan, periksa kembali file')->with('panel','danger');
        }
        $new_record = 0;
        foreach($data as $key => $value){
          // $insert[] = ['bidang_usaha'=>$value->bidang_usaha];
          if(!empty($value)){
            //check sudah ada atau belum
            if(!Institusi::where('nama_institusi',$value->nama_institusi)->first()){
              $new_line = new Institusi();
              $new_line->id_provinsi = $value->id_provinsi;
              $new_line->id_kota = $value->id_kota;
              $new_line->nama_institusi = $value->nama_institusi;
              $new_line->singkatan = $value->singkatan;
              $new_line->save();
              $new_record++;
            }
          }
        }
      }
      return redirect('institusi')->with('message','Data berhasil disimpan!, '.$new_record.' new entries')->with('panel','success');
    }
  }

}
