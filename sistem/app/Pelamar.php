<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelamar extends Model
{
    protected $table = 'pelamar';
    protected $primaryKey = 'id';
    protected $fillable = ['no_applicant','job_interest_1','job_interest_2',
    'job_interest_3','job_interest_4','id_iklan',
    'medion_employee_name','nama',
    'jenis_kelamin','status',
    'tgl_lahir','email','mobile_phone',
    'photo','id_tingkat_pendidikan','id_institusi',
    'other_institusi','id_major','other_major','gpa',
    'start_year_education','end_year_education',
    'id_bidang_usaha','other_bidang_usaha','start_year_work_experience',
    'end_year_work_experience','id_tgl_psychotest','id_kota','pernah_pkl_dimedion',
    'tgl_praktek_start','tgl_praktek_end','pernah_psychotest_dimedion','tgl_psychotest_dimedion'];


    public function tingkat_pendidikan()
    {
    	return $this->belongsTo('App\TingkatPendidikan', 'id_tingkat_pendidikan');
    }

    public function institusi()
    {
    	return $this->belongsTo('App\Institusi', 'id_institusi');
    }

    public function major()
    {
    	return $this->belongsTo('App\Major', 'id_major');
    }

    public function akreditasi(){
      return $this->belongsTo('App\Akreditasi','id_major');
    }

    public function get_bidang_usaha()
    {
    	return $this->belongsTo('App\Bidang_usaha', 'id_bidang_usaha');
    }

    public function tanggal_psychotest()
    {
    	return $this->belongsTo('App\TanggalPsychotest', 'id_tgl_psychotest');
    }

    public function kota()
    {
    	return $this->belongsTo('App\Kota', 'id_kota');
    }

    public function iklan()
    {
        return $this->belongsTo('App\Iklan', 'id_iklan');
    }

    public function detail_edu_bg()
    {
        return $this->hasMany('App\DetailEducation', 'id_pelamar');
    }

    public function detail_we()
    {
        return $this->hasMany('App\DetailWorkExperience', 'id_pelamar');
    }

    public function job_interest1(){
      return $this->belongsTo('App\Loker','job_interest_1','no_rcr');
    }
    public function job_interest2(){
      return $this->belongsTo('App\Loker','job_interest_2','no_rcr');
    }
    public function job_interest3(){
      return $this->belongsTo('App\Loker','job_interest_3','no_rcr');
    }
    public function job_interest4(){
      return $this->belongsTo('App\Loker','job_interest_4','no_rcr');
    }
}
