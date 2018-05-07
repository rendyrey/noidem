<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\AdvertisingCategoryRequest;
use App\AdvertisingCategory;
use DB;

class AdvertisingCategoryController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    
	public function index()
	{
		$advertising_category = AdvertisingCategory::all();
    	return view('admin.advertising_category.index', compact('advertising_category'));
	}

	public function tambah(AdvertisingCategoryRequest $request)
	{
		$kategori = $request->kategori;
		DB::table('advertising_category')->insert(['kategori' => $kategori]);
		return redirect('advertising_category')->with('message','Data berhasil disimpan!')->with('panel','success');
	}

	public function edit($id)
	{
		$advertising_category = AdvertisingCategory::findOrfail($id);
		return view('admin.advertising_category.edit',compact('advertising_category'));
	}
    
    public function update($id, AdvertisingCategoryRequest $request)
    {
    	$kategori = $request->kategori;
    	DB::table('advertising_category')->where('id', $id)->update(['kategori' => $kategori]);
    	return redirect('advertising_category')->with('message','Data berhasil diubah!')->with('panel','success');
    }
}
