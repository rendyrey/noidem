<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BidangUsahaRequest;
use App\Bidang_usaha;
use App\Http\Requests;
use DB;

class BidangUsahaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
    	$bidang_usaha = Bidang_usaha::all();
    	return view('admin.bidang_usaha.index', compact('bidang_usaha'));
    }

    public function tambah(BidangUsahaRequest $request)
    {
    	$bidang_usaha = $request->bidang_usaha;
        DB::table('bidang_usaha')->insert(['bidang_usaha' => $bidang_usaha]);
        return redirect('bidang_usaha')->with('message', 'Data Berhasil Disimpan !');
    }

    public function edit($id)
    {
    	$bidang_usaha = Bidang_usaha::findOrfail($id);
    	return view('admin.bidang_usaha.edit', compact('bidang_usaha'));
    }

    public function update($id, BidangUsahaRequest $request)
    {
    	$bidang_usaha = $request->bidang_usaha;
    	DB::table('bidang_usaha')->where('id', $id)->update(['bidang_usaha' => $bidang_usaha]);
    	return redirect('bidang_usaha')->with('message', 'Data berhasil diubah!');
    }
}
