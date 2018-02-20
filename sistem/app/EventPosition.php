<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventPosition extends Model
{
    protected $table = 'event_position';
    protected $primaryKey = 'id';
    protected $fillable = ['event_vacancy_code','no_reqruitment_request','position_name','jumlah_dibutuhkan'];
}
