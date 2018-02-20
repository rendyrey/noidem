<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EventVacancyRequest;
use App\Http\Requests;
use App\AdvertisingMedia;
use App\EventVacancy;
use DB;

class EventVacancyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
    	$event_vacancy = EventVacancy::all();
    	$advertising_media = AdvertisingMedia::all()->lists('media','id');
    	return view('admin.event_vacancy.index', compact('event_vacancy','advertising_media'));
    }

    public function tambah(EventVacancyRequest $request)
    {
        $event_vacancy = new EventVacancy;

        $event_vacancy->event_code = $request->event_code;
        $event_vacancy->id_media = $request->id_media;
        $event_vacancy->plan_start_date = $request->plan_start_date;
        $event_vacancy->plan_end_date = $request->plan_end_date;
        $event_vacancy->actual_start_date = $request->actual_start_date;
        $event_vacancy->actual_end_date = $request->actual_end_date;
        $event_vacancy->budget = $request->budget;
        $event_vacancy->cost = $request->cost;
        $event_vacancy->target_fresh = $request->target_fresh;
        $event_vacancy->target_exp = $request->target_exp;
        $event_vacancy->target_fresh_call = $request->target_fresh_call;
        $event_vacancy->target_exp_call = $request->target_exp_call;
        $event_vacancy->target_fresh_pass = $request->target_fresh_pass;
        $event_vacancy->target_exp_pass = $request->target_exp_pass;
        $event_vacancy->is_active = $request->is_active;
        $event_vacancy->domain = $request->domain;
        $event_vacancy->save();
        return redirect('event_vacancy')->with('message','Data berhasil disimpan!');
   } 

    public function edit($id)
    {
    	$event_vacancy = EventVacancy::findOrfail($id);
    	$advertising_media = AdvertisingMedia::all()->lists('media','id');
    	return view('admin.event_vacancy.edit', compact('event_vacancy','advertising_media'));
    }

    public function update($id, EventVacancyRequest $request)
    {
    	$event_code = $request->event_code;
    	$id_media = $request->id_media;
    	$plan_start_date = $request->plan_start_date;
    	$plan_end_date = $request->plan_end_date;
    	$actual_start_date = $request->actual_start_date;
    	$actual_end_date = $request->actual_end_date;
    	$budget = $request->budget;
    	$cost = $request->cost;
    	$target_fresh = $request->target_fresh;
    	$target_exp = $request->target_exp;
    	$target_fresh_call = $request->target_fresh_call;
        $target_exp_call = $request->target_exp_call;
        $target_fresh_pass = $request->target_fresh_pass;
        $target_exp_pass = $request->target_exp_pass;
        $is_active = $request->is_active;
        $domain = $request->domain;
        DB::table('event_vacancy')->where('id', $id)->update(['event_code' => $event_code, 'id_media' => $id_media, 'plan_start_date' => $plan_start_date, 'plan_end_date' => $plan_end_date, 'actual_start_date' => $actual_start_date, 'actual_end_date' => $actual_end_date, 'budget' => $budget, 'cost' => $cost, 'target_fresh' => $target_fresh, 'target_exp' => $target_exp, 'target_fresh_call' => $target_fresh_call, 'target_exp_call' => $target_exp_call, 'target_fresh_pass' => $target_fresh_pass, 'target_exp_pass' => $target_exp_pass, 'is_active' => $is_active, 'domain' => $domain]);
        return redirect('event_vacancy')->with('message','Data berhasil diubah!');
    }
}
