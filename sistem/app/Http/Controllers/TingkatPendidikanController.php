<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TingkatPendidikanRequest;
use App\Http\Requests;
use App\TingkatPendidikan;
use DB;

class TingkatPendidikanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
    	$tingkat_pendidikan = TingkatPendidikan::all();
    	return view('admin.tingkat_pendidikan.index', compact('tingkat_pendidikan'));
    }

    public function tambah(TingkatPendidikanRequest $request)
    {
    	$tingkat = $request->tingkat;
    	$no_urut = $request->no_urut;
    	DB::table('tingkat_pendidikan')->insert(['tingkat' => $tingkat, 'no_urut' => $no_urut]);
    	return redirect('tingkat_pendidikan')->with('message','Data berhasil disimpan!')->with('panel','success');
    }

    public function edit($id)
    {
    	$tingkat_pendidikan = TingkatPendidikan::findOrfail($id);
    	return view('admin.tingkat_pendidikan.edit', compact('tingkat_pendidikan'));
    }

    public function update($id, TingkatPendidikanRequest $request)
    {
    	$tingkat = $request->tingkat;
    	$no_urut = $request->no_urut;
    	DB::table('tingkat_pendidikan')->where('id', $id)->update(['tingkat' => $tingkat, 'no_urut' => $no_urut]);
    	return redirect('tingkat_pendidikan')->with('message', 'Data berhasil diubah!')->with('panel','success');
    }
}
