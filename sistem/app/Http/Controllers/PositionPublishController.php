<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Posisi;

class PositionPublishController extends Controller
{
    //
    public function index(){
        $data['position_publish'] = Posisi::all();
        return view('admin.position_publish.index',$data);
    }

    public function edit($id){
        $data['position_publish'] = Posisi::findOrfail($id);
      return view('admin.position_publish.edit',$data);
    }

    public function update(Request $request,$id){
        $this->validate($request,[
            // 'divisi'=>'required',
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
          return redirect('position_publish')->with('message', 'Data posisi berhasil dirubah!')->with('panel','success');
    }

    public function delete($id){
        $hapus = Posisi::findOrfail($id);
        $hapus->delete();
        return redirect('position_publish')->with('message', 'Data posisi berhasil dihapus!')->with('panel','success');
      }
}
