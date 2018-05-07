<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TanggalPsychotestRequest;
use App\Http\Requests;
use App\TanggalPsychotest;
use App\Iklan;
use App\Kota;
use Carbon\Carbon;
use DB;

class TanggalPsychotestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$tanggal_psychotest = TanggalPsychotest::all();
        $iklan = Iklan::where('actual_end_date','>=',Carbon::today())->get();
        $kota = Kota::all();
    	return view('admin.tanggal_psychotest.index', compact('tanggal_psychotest','iklan','kota'));
    }

    public function tambah(TanggalPsychotestRequest $request)
    {   
    	$tanggal_psychotest = new TanggalPsychotest;
        $tanggal_psychotest->id_iklan = $request->input('id_iklan',0);
        $tanggal_psychotest->id_kota = $request->id_kota;
    	$tanggal_psychotest->tanggal = $request->tanggal_psychotest;
        $tanggal_psychotest->keterangan = $request->keterangan;
        $tanggal_psychotest->kuota = $request->kuota;
    	$tanggal_psychotest->save();
    	return redirect('tanggal_psychotest')->with('message', 'Data Berhasil Disimpan !')->with('panel','success');
    }

    public function edit($id)
    {
        $tanggal_psychotest = TanggalPsychotest::findOrfail($id);
        $iklan = Iklan::all();
        $kota = Kota::all();
        return view('admin.tanggal_psychotest.edit', compact('tanggal_psychotest','iklan','kota'));
    }

    public function update($id,request $request)
    {   
        $this->validate($request,[
            'tanggal_psychotest'=>'required',
            'id_kota'=>'required',
            'keterangan'=>'required',
            'kuota'=>'required|numeric'
        ],[
            'tanggal_psychotest.required' => 'Tanggal tidak boleh kosong!',
            'id_kota.required' => 'Kota tidak boleh kosong!',
            'kuota.required' => 'Kuota tidak boleh kosong!',
            'keterangan.required' => 'Keterangan tidak boleh kosong!',
            'kuota.numeric' => 'Kuota harus menggunakan angka!'
        ]);
        $id_iklan = $request->id_iklan;
        $id_kota = $request->id_kota;
        $tanggal_psychotest = $request->tanggal_psychotest;
        $keterangan = $request->keterangan;
        DB::table('tanggal_psychotest')->where('id', $id)->update(['tanggal' => $tanggal_psychotest, 'id_iklan' => $id_iklan, 'id_kota' => $id_kota, 'keterangan' => $keterangan]);
        return redirect('tanggal_psychotest')->with('message', 'Data berhasil diubah!')->with('panel','success');
    }
}
