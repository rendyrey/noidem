<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Akreditasi extends Model
{
    protected $table = 'akreditasi';
    protected $primaryKey = 'id';
    protected $fillable = ['id_institusi','id_major','akreditasi','id_tingkat_pendidikan','tgl_kadaluarsa'];

    public function institusi()
    {
    	return $this->belongsTo('App\Institusi', 'id_institusi');
    }

    public function major()
    {
    	return $this->belongsTo('App\Major', 'id_major');
    }

    public function tingkat_pendidikan()
    {
    	return $this->belongsTo('App\TingkatPendidikan', 'id_tingkat_pendidikan');
    }
}
