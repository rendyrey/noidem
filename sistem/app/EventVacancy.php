<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventVacancy extends Model
{
    protected $table = 'event_vacancy';
    protected $primaryKey = 'id';
    protected $fillable = ['event_code','id_media','plan_start_date','plan_end_date','actual_start_date','actual_end_date','budget','cost','target_fresh','target_exp','actual_fresh','actual_exp','target_fresh_call','target_exp_call','actual_fresh_call','actual_exp_call','awaiting_fresh','awaiting_exp','target_fresh_pass','target_exp_pass','actual_fresh_pass','actual_exp_pass','index_adv_media_effect_fresh','index_adv_media_effect_exp','is_active'];

    public function advertising_media()
    {
    	return $this->belongsTo('App\AdvertisingMedia', 'id_media');
    }
}
