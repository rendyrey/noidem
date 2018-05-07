<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posisi extends Model
{
    //
    protected $table = "posisi";
    protected $fillable = ['divisi','posisi','posisi_publish'];

}
