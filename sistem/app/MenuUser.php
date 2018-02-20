<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuUser extends Model
{
    protected $table = 'menu_user';
    protected $primaryKey = 'id';
    protected $fillable = ['id_induk','menu','icon','url','no_urut'];
}
