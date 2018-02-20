<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MajorRequest;
use App\MajorGrup;
use App\Major;
use App\Http\Requests;
use DB;
use Carbon\Carbon;

class MajorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
    	$major = Major::all();
    	$major_grup = MajorGrup::all()->lists('nama_grup','id');
    	return view('admin.major.index', compact('major','major_grup'));
    }

    public function tambah(MajorRequest $request)
    {
        $major = new Major;
    	$major->kode_major = $request->kode_major;
    	$major->major = $request->major;
    	$major->id_grup = $request->id_grup;
        $major->created_at = Carbon::now();
        $major->save();
        
    	return redirect('major')->with('message', 'Data Berhasil Disimpan !');
    }

    public function edit($id)
    {
    	$major = Major::findOrfail($id);
    	$major_grup = MajorGrup::all()->lists('nama_grup','id');
    	return view('admin.major.edit', compact('major','major_grup'));
    }

    public function update($id, MajorRequest $request)
    {
    	$kode_major = $request->kode_major;
    	$major = $request->major;
    	$id_grup = $request->id_grup;
    	DB::table('major')->where('id', $id)->update(['kode_major' => $kode_major, 'major' => $major, 'id_grup' => $id_grup]);
    	return redirect('major')->with('message', 'Data berhasil diubah');
    }
}
