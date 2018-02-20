<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Akreditasi;
use App\Institusi;
use App\Major;
use App\TingkatPendidikan;
use App\Http\Requests\AkreditasiRequest;
use Carbon\Carbon;
use Input;
use Excel;
use DB;

class AkreditasiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    } 
    
    public function index()
    {
    	$akreditasi = Akreditasi::all();
    	$institusi = Institusi::all();
    	$major = Major::all();
    	$tingkat_pendidikan = TingkatPendidikan::all();

    	return view('admin.akreditasi.index', compact('akreditasi','institusi','major','tingkat_pendidikan'));
    }

    public function tambah(AkreditasiRequest $request)
    {
    	$akreditasi = new Akreditasi;
    	$akreditasi->id_institusi = $request->id_institusi;
    	$akreditasi->id_major = $request->id_major;
    	$akreditasi->id_tingkat_pendidikan = $request->id_tingkat_pendidikan;
    	$akreditasi->akreditasi = $request->akreditasi;
    	$akreditasi->tgl_kadaluarsa = $request->tgl_kadaluarsa;
    	$akreditasi->created_at = Carbon::now();
    	$akreditasi->save();

    	return redirect('akreditasi')->with('message', 'Data Berhasil Disimpan!');
    }

    public function edit($id)
    {
    	$akreditasi = Akreditasi::findOrfail($id);
    	$institusi = Institusi::all();
    	$major = Major::all();
    	$tingkat_pendidikan = TingkatPendidikan::all();

    	return view('admin.akreditasi.edit', compact('akreditasi','institusi','major','tingkat_pendidikan'));
    }

    public function update($id, AkreditasiRequest $request)
    {
    	$id_institusi = $request->id_institusi;
    	$id_major = $request->id_major;
    	$id_tingkat_pendidikan = $request->id_tingkat_pendidikan;
    	$akreditasi = $request->akreditasi;
    	$tgl_kadaluarsa = $request->tgl_kadaluarsa;

    	DB::table('akreditasi')->where('id', $id)->update(['id_institusi' => $id_institusi, 'id_major' => $id_major, 'id_tingkat_pendidikan' => $id_tingkat_pendidikan, 'akreditasi' => $akreditasi, 'tgl_kadaluarsa' => $tgl_kadaluarsa, 'updated_at' => Carbon::now()]);

    	return redirect('akreditasi')->with('message', 'Data Berhasil Diubah!');
    }

    public function import()
    {
        $now = Carbon::now();
        if(Input::hasFile('import_akreditasi')){
            $path = Input::file('import_akreditasi')->getRealPath();
            $data = Excel::load($path, function($reader) {
        })->get();

        if(!empty($data) && $data->count()){
            foreach ($data as $key => $value) {
                $insert[] = ['id_institusi' => $value->id_institusi, 'id_major' => $value->id_major, 'akreditasi' => $value->akreditasi, 'id_tingkat_pendidikan' => $value->id_tingkat_pendidikan, 'tgl_kadaluarsa' => $value->tgl_kadaluarsa, 'created_at' => $now, 'updated_at' => $now];
            }

        if(!empty($insert)){
            DB::table('akreditasi')->insert($insert);
            return redirect('import')->with('message', 'Data pegawai berhasil diimport !');
        }else{
            return redirect('import')->with('message', 'Data pegawai GAGAL diimport, perikasa kembali format dalam file *xls !');
        }
        }
        }
        return back();
    }
}
