<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdvertisingMedia extends Model
{
    use SoftDeletes;

    protected $table = 'advertising_media';
    protected $primaryKey = 'id';
    protected $fillable = ['id_kategori','media'];
    protected $dates = ['deleted_at'];

    public function advertising_category()
    {
    	return $this->belongsTo('App\AdvertisingCategory', 'id_kategori');
    }

    public function event_vacancy()
    {
    	return $this->hasMany('App\EventVacancy', 'id_media');
    }

    public function iklan()
    {
        return $this->hasMany('App\Iklan', 'id_media');
    }
}
