<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MajorGrupRequest;
use App\MajorGrup;
use App\Http\Requests;
use DB;

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
}
