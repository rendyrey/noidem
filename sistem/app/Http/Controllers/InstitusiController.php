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
    
}
