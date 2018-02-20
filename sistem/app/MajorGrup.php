<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MajorGrup extends Model
{
    use SoftDeletes;

    protected $table = 'major_grup';
    protected $primaryKey = 'id';
    protected $fillable = ['kode','nama_grup'];
    protected $dates = ['deleted_at'];

    public function major()
    {
    	return $this->hasMany('App\Major', 'id_grup');
    }

    public function loker()
    {
    	return $this->hasMany('App\Loker', 'id_major_grup');
    }
}
