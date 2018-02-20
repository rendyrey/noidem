<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProvinsiRequest;
use App\Provinsi;
use App\Http\Requests;
use DB;

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
        return redirect('provinsi')->with('message', 'Data Berhasil Disimpan !');
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
    	return redirect('provinsi')->with('message', 'Data berhasil diubah!');
    }

    // public function hapus($id)
    // {
    //     $provinsi = Provinsi::findOrfail($id);
    //     $provinsi->delete();
    //     $provinsi->kota()->delete();
    //     return redirect('provinsi')->with('messages', 'Data berhasil dihapus!');
    // }
}
