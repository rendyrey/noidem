<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestType extends Model
{
    //
    protected $table = 'test_type';
    protected $fillable = ['test_type'];

    public function syarat_psychotest(){
        return $this->hasMany('App\SyaratPsychotest','id');
    }
}
