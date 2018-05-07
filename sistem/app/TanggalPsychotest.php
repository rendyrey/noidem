<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TanggalPsychotest extends Model
{
    protected $table = 'tanggal_psychotest';
    protected $primaryKey = 'id';
    protected $fillable = ['id_iklan','id_kota','tanggal','keterangan','kuota'];

    public function pelamar()
    {
    	return $this->hasMany('App\Pelamar', 'id_tgl_psychotest');
    }

    public function iklan()
    {
    	return $this->belongsTo('App\Iklan', 'id_iklan');
    }

    public function kota()
    {
    	return $this->belongsTo('App\Kota', 'id_kota');
    }
}
