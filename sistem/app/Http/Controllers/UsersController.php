<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\User;
use DB;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    } 

    public function index()
    {
    	$user = User::all();
    	return view('admin.user.index', compact('user'));	

    }

    public function tambah(UserRequest $request)
    {
    	$simpan = new User;
        $simpan->name = $request->name;
        $simpan->email = $request->email;
        $simpan->password = bcrypt($request->password);
        $simpan->save();

    	return redirect('user')->with('message', 'Data User berhasil ditambahkan!')->with('panel','success');

    }

    public function edit($id)
    {
    	$user = User::findOrfail($id);
    	return view('admin.user.edit', compact('user'));
    }

    public function update($id, UserRequest $request)
    {
    	$name = $request->name;
    	$email = $request->email;
    	$password = bcrypt($request->password);

    	DB::table('users')->where('id', $id)->update(['name' => $name, 'email' => $email, 'password' => $password]);

    	return redirect('user')->with('message', 'Data berhasil diubah!')->with('panel','success');
    }

    public function hapus($id)
    {
    	$hapus = User::findOrfail($id);
        $hapus->delete();
        return redirect('user')->with('messages', 'Data berhasil dihapus!')->with('panel','success');
    }
}
