<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailWorkExperience extends Model
{
    protected $table = 'detail_we';
    protected $primaryKey = 'id';
    protected $fillable = ['id_pelamar','id_bidang_usaha_1','other_bidang_usaha_1','start_year_1','end_year_1','id_bidang_usaha_2','other_bidang_usaha_2','start_year_2','end_year_2','id_bidang_usaha_3','other_bidang_usaha_3','start_year_3','end_year_3','id_bidang_usaha_4','other_bidang_usaha_4','start_year_4','end_year_4'];

    public function pelamar()
    {
    	return $this->belongsTo('App\Pelamar', 'id_pelamar');
    }

    public function bidang_usaha1()
    {
    	return $this->belongsTo('App\Bidang_usaha', 'id_bidang_usaha_1');
    }

    public function bidang_usaha2()
    {
    	return $this->belongsTo('App\Bidang_usaha', 'id_bidang_usaha_2');
    }

    public function bidang_usaha3()
    {
    	return $this->belongsTo('App\Bidang_usaha', 'id_bidang_usaha_3');
    }

    public function bidang_usaha4()
    {
    	return $this->belongsTo('App\Bidang_usaha', 'id_bidang_usaha_4');
    }
}
