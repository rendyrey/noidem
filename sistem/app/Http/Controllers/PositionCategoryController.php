<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\PositionCategory;

class PositionCategoryController extends Controller
{
    //
    public function index(){
        $data['position_category'] = PositionCategory::get();
        return view('admin.position_category.index',$data);
    }

    public function tambah(Request $request){
      $this->validate($request,[
        'position_category'=>'required'
      ],[
        'position_category.required'=>'Position Category harus diisi!'
      ]);
      $input = new PositionCategory;
      $input->position_category = $request->position_category;
      $input->save();

      return redirect('position_category')->with('message','Data berhasil disimpan!')->with('panel','success');
    }

    public function delete($id){
      $hapus = PositionCategory::findOrfail($id);
      $hapus->delete();
      return redirect('position_category')->with('message','Data berhasil dihapus!')->with('panel','success');
    }
}
