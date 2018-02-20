<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Provinsi extends Model
{
    use SoftDeletes;

    protected $table = 'provinsi';
    protected $primaryKey = 'id';
    protected $fillable = ['province'];
    protected $dates = ['deleted_at'];

    public function institusi()
    {
    	return $this->hasMany('App\Institusi', 'id_provinsi');
    }

    public function kota()
    {
    	return $this->hasMany('App\Kota', 'id_provinsi');
    }
}
