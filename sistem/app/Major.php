<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Major extends Model
{
    use SoftDeletes;

    protected $table = 'major';
    protected $primaryKey = 'id';
    protected $fillable = ['id_grup','major'];
    protected $dates = ['deleted_at'];

    public function major_grup()
    {
    	return $this->belongsTo('App\MajorGrup', 'id_grup');
    }

    public function pelamar()
    {
    	return $this->hasMany('App\Pelamar', 'id_major');
    }

    public function loker()
    {
        return $this->hasMany('App\Loker', 'id_major');
    }

    public function detail_edu_bg()
    {
        return $this->hasMany('App\DetailEducation', 'id_major_1','id_major_1');
    }

    public function akreditasi()
    {
        return $this->hasMany('App\Akreditasi', 'id_major');
    }

    public function syarat_prescreening(){
        return $this->hasMany('App\SyaratPrescreening','id');
    }
}
