<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kota extends Model
{
    use SoftDeletes;

    protected $table = 'kota';
    protected $primaryKey = 'id';
    protected $fillable = ['id_provinsi','kota'];
    protected $dates = ['deleted_at'];

    public function institusi()
    {
    	return $this->hasMany('App\Institusi', 'id_kota');
    }

    public function provinsi()
    {
    	return $this->belongsTo('App\Provinsi', 'id_provinsi');
    }

    public function pelamar()
    {
        return $this->hasMany('App\Pelamar', 'id_kota');
    }

    public function tanggal_psychotest()
    {
        return $this->hasMany('App\TanggalPsychotest', 'id_kota');
    }
}
