<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KriteriaSyarat extends Model
{
    //
    protected $table = 'syarat';
    protected $fillable = ['gpa','akreditas','masa_studi','usia','keterangan'];
}
