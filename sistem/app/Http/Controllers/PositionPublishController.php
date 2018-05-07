<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PositionPublishController extends Controller
{
    //
    public function index(){
        return view('admin.position_publish.index');
    }
}
