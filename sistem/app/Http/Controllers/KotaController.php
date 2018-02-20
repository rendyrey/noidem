<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\KotaRequest;
use App\Kota;
use App\Provinsi;
use App\Http\Requests;
use DB;

class KotaController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    
	public function index()
	{
		$kota = Kota::all();
		$provinsi = Provinsi::all()->lists('province','id');
    	return view('admin.kota.index', compact('kota','provinsi'));
	}

	public function tambah(KotaRequest $request)
	{
		$kota = $request->kota;
		$id_provinsi = $request->id_provinsi;
		DB::table('kota')->insert(['kota' => $kota, 'id_provinsi' => $id_provinsi]);
		return redirect('kota')->with('message', 'Data Berhasil Disimpan !');
	}

	public function edit($id)
	{
		$kota = Kota::findOrfail($id);
		$provinsi = Provinsi::all()->lists('province','id');
    	return view('admin.kota.edit', compact('kota','provinsi'));
	}

	public function update($id, KotaRequest $request)
	{
		$kota = $request->kota;
		$id_provinsi = $request->id_provinsi;
		DB::table('kota')->where('id', $id)->update(['kota' => $kota, 'id_provinsi' => $id_provinsi]);
    	return redirect('kota')->with('message', 'Data berhasil diubah!');
	}    
}