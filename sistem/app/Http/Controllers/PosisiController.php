<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Posisi;

class PosisiController extends Controller
{
    //
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function index(){
      $data['posisi'] = Posisi::all();
      return view('admin.posisi.index',$data);
    }

    public function edit($id){
      $data['posisi'] = Posisi::findOrfail($id);
      return view('admin.posisi.edit',$data);
    }

    public function update($id,request $request){
      $this->validate($request,[
        'divisi'=>'required',
        'posisi'=>'required',
        'posisi_publish'=>'required'
      ],[
        'divisi.required'=>'Kolom Divisi harus diisi!',
        'posisi.required'=>'Kolom Posisi harus diisi!',
        'posisi_publish.required'=>'Kolok Posisi Publish harus diisi!'
      ]);
      $posisi = Posisi::findOrfail($id);
      $posisi->divisi = $request->divisi;
      $posisi->posisi = $request->posisi;
      $posisi->posisi_publish = $request->posisi_publish;
      $posisi->save();
      return redirect('posisi')->with('message', 'Data posisi berhasil dirubah!')->with('panel','success');
    }

    public function delete($id){
      $hapus = Posisi::findOrfail($id);
      $hapus->delete();
      return redirect('posisi')->with('message', 'Data posisi berhasil dihapus!')->with('panel','success');
    }

    public function tambah(request $request){
      $this->validate($request,[
        'divisi'=>'required',
        'posisi'=>'required',
        'posisi_publish'=>'required'
      ],[
        'divisi.required'=>'Kolom Divisi harus diisi!',
        'posisi.required'=>'Kolom Posisi harus diisi!',
        'posisi_publish.required'=>'Kolok Posisi Publish harus diisi!'
      ]);
      $posisi = new Posisi;
      $posisi->divisi = $request->divisi;
      $posisi->posisi = $request->posisi;
      $posisi->posisi_publish = $request->posisi_publish;
      $posisi->save();
      return redirect('posisi')->with('message', 'Data posisi berhasil disimpan!')->with('panel','success');
    }
}
