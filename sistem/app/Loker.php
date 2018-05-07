<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loker extends Model
{
    protected $table = 'loker';
    protected $primaryKey = 'id';
    protected $fillable = ['id_iklan','budget','cost','id_tingkat_pendidikan','id_major_grup','id_major','no_rcr','position_name','position_publish','target_fresh','target_exp','actual_fresh','actual_exp','target_pg_fresh','actual_pg_fresh','target_pg_exp','actual_pg_exp','awaiting_fresh','awaiting_exp','target_pass_fresh','target_pass_exp','actual_pass_fresh','actual_pass_exp','index_adv_media_effect_fresh','index_adv_media_effect_exp'];

    public function iklan()
    {
    	return $this->belongsTo('App\Iklan', 'id_iklan');
    }

    public function tingkat_pendidikan()
    {
    	return $this->belongsTo('App\TingkatPendidikan', 'id_tingkat_pendidikan');
    }

    public function major_grup()
    {
    	return $this->belongsTo('App\MajorGrup', 'id_major_grup');
    }

    public function major()
    {
    	return $this->belongsTo('App\Major', 'id_major');
    }

    public function pelamar(){
      return $this->hasMany('App\Pelamar','no_rcr');
    }
}
