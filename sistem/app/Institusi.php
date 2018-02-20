<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Institusi extends Model
{
    use SoftDeletes;

    protected $table = 'institusi';
    protected $primaryKey = 'id';
    protected $fillable = ['id_provinsi','id_kota','nama_institusi','singkatan'];
    protected $dates = ['deleted_at'];

    public function provinsi()
    {
    	return $this->belongsTo('App\Provinsi', 'id_provinsi');
    }

    public function kota()
    {
    	return $this->belongsTo('App\Kota', 'id_kota');
    }

    public function pelamar()
    {
        return $this->hasMany('App\Pelamar', 'id_institusi');
    }

    public function detail_edu_bg()
    {
        return $this->hasMany('App\DetailEducation', 'id_institusi_1','id_institusi_2');
    }

    public function akreditasi()
    {
        return $this->hasMany('App\Akreditasi', 'id_institusi');
    }
}
