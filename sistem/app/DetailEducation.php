<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailEducation extends Model
{
    protected $table = 'detail_edu_bg';
    protected $primaryKey = 'id';
    protected $fillable = ['id_pelamar','id_tingkat_pendidikan_1','id_institusi_1','other_institusi_1','id_major_1','other_major_1','gpa_1','start_year_1','end_year_1','id_tingkat_pendidikan_2','id_institusi_2','other_institusi_2','id_major_2','other_major_2','gpa_2','start_year_2','end_year_2'];

    public function pelamar()
    {
    	return $this->belongsTo('App\Pelamar', 'id_pelamar');
    }

    public function tingkat_pendidikan1()
    {
    	return $this->belongsTo('App\TingkatPendidikan', 'id_tingkat_pendidikan_1');
    }

    public function tingkat_pendidikan2()
    {
    	return $this->belongsTo('App\TingkatPendidikan', 'id_tingkat_pendidikan_2');
    }

    public function institusi1()
    {
    	return $this->belongsTo('App\Institusi', 'id_institusi_1');
    }

    public function institusi2()
    {
    	return $this->belongsTo('App\Institusi', 'id_institusi_2');
    }

    public function major1()
    {
    	return $this->belongsTo('App\Major', 'id_major_1');
    }

    public function major2()
    {
    	return $this->belongsTo('App\Major', 'id_major_2');
    }
}
