<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MenuUser;
use App\Http\Requests;
use App\Http\Requests\MenuUserRequest;
use DB;
use Carbon\Carbon;

class MenuUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
    	$menu_user = DB::table('menu_user')->orderBy('id_induk','ASC')->get();
    	$menu_user_list = MenuUser::all()->lists('menu','id');
    	return view('admin.menu_user.index',compact('menu_user','menu_user_list'));
    }

    public function tambah(MenuUserRequest $request)
    {
    	$id_induk = $request->id_induk;
    	$menu = $request->menu;
    	$icon = $request->icon;
    	$url = $request->url;
    	$no_urut = $request->no_urut;
		$created_at = Carbon::now();
        $updated_at = Carbon::now();
    	DB::table('menu_user')->insert(['id_induk' =>$id_induk, 'menu' => $menu, 'icon' => $icon, 'url' => $url, 'no_urut' => $no_urut, 'created_at' => $created_at, 'updated_at' => $updated_at]);
    	return redirect('menu_user')->with('message','Data berhasil disimpan!');
    }

    public function edit($id)
    {
    	$menu_user = MenuUser::findOrfail($id);
    	$menu_user_list = MenuUser::all()->lists('menu','id');
    	$parent = DB::table('menu_user')->where('id', $id)->value('id_induk');
    	$parent_name = DB::table('menu_user')->where('id', $parent)->value('menu');
    	return view('admin.menu_user.edit', compact('menu_user','menu_user_list','parent_name'));
    }

    public function update($id, MenuUserRequest $request)
    {
    	$id_induk = $request->id_induk;
    	$menu = $request->menu;
    	$icon = $request->icon;
    	$url = $request->url;
    	$no_urut = $request->no_urut;
		$updated_at = Carbon::now();
    	DB::table('menu_user')->where('id',$id)->update(['id_induk' =>$id_induk, 'menu' => $menu, 'icon' => $icon, 'url' => $url, 'no_urut' => $no_urut, 'updated_at' => $updated_at]);
    	return redirect('menu_user')->with('message','Data berhasil diubah!');
    }
}
