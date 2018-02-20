<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdvertisingCategory extends Model
{
    use SoftDeletes;

    protected $table = 'advertising_category';
    protected $primaryKey = 'id';
    protected $fillable = ['kategori'];
    protected $dates = ['deleted_at'];

    public function advertising_media()
    {
    	return $this->hasMany('App\AdvertisingMedia', 'id_kategori');
    }

    public function pelamar()
    {
    	return $this->hasMany('App\Pelamar', 'id_kategori');
    }

    public function iklan()
    {
        return $this->hasMany('App\Iklan', 'id_kategori');
    }
}
