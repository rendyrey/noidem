<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bidang_usaha extends Model
{
    use SoftDeletes;

    protected $table = 'bidang_usaha';
    protected $primaryKey = 'id';
    protected $fillable = ['bidang_usaha'];
    protected $dates = ['created_at','updated_at','deleted_at'];

    public function pelamar()
    {
    	return $this->hasMany('App\Pelamar', 'id_bidang_usaha');
    }

    public function detail_we1()
    {
    	return $this->hasMany('App\DetailWorkExperience', 'id_bidang_usaha_1','id_bidang_usaha_2','id_bidang_usaha_3','id_bidang_usaha_4');
    }
}
