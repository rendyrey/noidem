<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestMethod extends Model
{
    //
    protected $table = 'test_method';
    protected $fillable = ['method'];

    public function tanggal_psychotest(){
        return $this->hasMany('App\TanggalPsychotest','id');
    }
}
