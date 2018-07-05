<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BidangUsahaRequest;
use App\Bidang_usaha;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use DB;
use Excel;

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
        return redirect('bidang_usaha')->with('message', 'Data Berhasil Disimpan !')->with('panel','success');
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
    	return redirect('bidang_usaha')->with('message', 'Data berhasil diubah!')->with('panel','success');
    }

    public function delete($id){
        $hapus = Bidang_usaha::findOrfail($id);
        $hapus->delete();
        return redirect('bidang_usaha')->with('message', 'Data berhasil dihapus!')->with('panel','success');
    }

    public function modal_hapus(Request $request){
        $hapus = Bidang_usaha::find($request->data);
        echo "<p>Yakin akan menghapus data <label>$hapus->bidang_usaha</label>?</p>";
    }

    public function export_bidang_usaha(){
      $data = Bidang_usaha::all();
      $items = array();
      foreach($data as $key=>$value){
        $items[$key]['No'] = ++$key;
        $items[$key]['Bidang Usaha'] = $value->bidang_usaha;
      }
      Excel::create('Bidang Usaha '.date('Y-m-d'),function($excel) use($items){
        $excel->sheet('Sheet 1',function($sheet) use ($items){
          $sheet->fromArray($items);
        });
      })->export('xls');
    }

    public function import_bidang_usaha(Request $request){
      $this->validate($request,[
        'file' => 'required'
      ]);

      if($request->file('file')){
        $path = $request->file('file')->path();
        $data = Excel::load($path,function($reader){
        })->get();

        if(!empty($data) && $data->count()){
          if(!isset($data[0]['bidang_usaha'])){
            return redirect('bidang_usaha')->with('message','Data gagal disimpan, periksa kembali file')->with('panel','danger');
          }
          $new_record = 0;
          foreach($data as $key => $value){
            // $insert[] = ['bidang_usaha'=>$value->bidang_usaha];
            if(!empty($value)){
              //check sudah ada atau belum
              if(!Bidang_usaha::where('bidang_usaha',$value->bidang_usaha)->first()){
                $new_line = new Bidang_usaha();
                $new_line->bidang_usaha = $value->bidang_usaha;
                $new_line->save();
                $new_record++;
              }
            }
          }
        }
        return redirect('bidang_usaha')->with('message','Data berhasil disimpan! '.$new_record.' new entries')->with('panel','success');
      }
    }
}
