<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TingkatPendidikan extends Model
{
    use SoftDeletes;

    protected $table = 'tingkat_pendidikan';
    protected $primaryKey = 'id';
    protected $fillable = ['tingkat','no_urut'];
    protected $dates = ['deleted_at'];

    public function pelamar()
    {
    	return $this->hasMany('App\Pelamar', 'id_tingkat_pendidikan');
    }

    public function loker()
    {
    	return $this->hasMany('App\Loker', 'id_tingkat_pendidikan');
    }

    public function detail_edu_bg()
    {
        return $this->hasMany('App\DetailEducation', 'id_tingkat_pendidikan_1','id_tingkat_pendidikan_2');
    }

    public function akreditasi()
    {
        return $this->hasMany('App\Akreditasi', 'id_tingkat_pendidikan');
    }
}
