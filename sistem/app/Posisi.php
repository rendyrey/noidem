<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posisi extends Model
{
    //
    protected $table = "posisi";
    protected $fillable = ['divisi','posisi','posisi_publish','id_position_category'];

    public function positionCategory(){
        return $this->belongsTo('App\PositionCategory','id_position_category');
    }

}
