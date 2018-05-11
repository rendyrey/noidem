<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SyaratPsychotest extends Model
{
    //
    protected $table = 'syarat_psychotest';
    protected $fillable = ['type','position_category','test_type','test_score','position','major'];

    public function get_test_type(){
        return $this->belongsTo('App\TestType','test_type');
    }

    public function posisi(){
        return $this->belongsTo('App\Posisi','position');
    }

    public function get_major(){
        return $this->belongsTo('App\Major','major');
    }
}
