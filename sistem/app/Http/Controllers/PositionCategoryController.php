<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PositionCategoryController extends Controller
{
    //
    public function index(){
        return view('admin.position_category.index');
    }
}
