<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AdvertisingMediaRequest;
use App\Http\Requests;
use App\AdvertisingMedia;
use App\AdvertisingCategory;
use DB;

class AdvertisingMediaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
    	$advertising_media = AdvertisingMedia::all();
    	$advertising_category = AdvertisingCategory::all()->lists('kategori','id');
    	return view('admin.advertising_media.index', compact('advertising_media','advertising_category'));
    }

    public function tambah(AdvertisingMediaRequest $request)
    {
    	$media = $request->media;
    	$id_kategori = $request->id_kategori;
    	DB::table('advertising_media')->insert(['id_kategori' => $id_kategori, 'media' => $media]);
    	return redirect('advertising_media')->with('message','Data berhasil disimpan!');
    }

    public function edit($id)
    {
    	$advertising_media = AdvertisingMedia::findOrfail($id);
    	$advertising_category = AdvertisingCategory::all()->lists('kategori','id');
    	return view('admin.advertising_media.edit', compact('advertising_media','advertising_category'));
    }

    public function update($id, AdvertisingMediaRequest $request)
    {
    	$media = $request->media;
    	$id_kategori = $request->id_kategori;
    	DB::table('advertising_media')->where('id', $id)->update(['id_kategori' => $id_kategori, 'media' => $media]);
    	return redirect('advertising_media')->with('message','Data berhasil diubah!');
    }
}
