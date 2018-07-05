<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PositionCategory extends Model
{
    //
    protected $table = 'position_category';
    protected $fillable = ['position_category'];

    public function posisi(){
        return $this->hasMany('App\Posisi','id_position_category');
    }
}
