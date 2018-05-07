<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SyaratPrescreening extends Model
{
    //
    protected $table = 'syarat_prescreening';
    protected $fillable = [
        'type',
        'position_category',
        'work_experience',
        'id_tingkat_pendidikan',
        'accreditation',
        'gpa',
        'study_period',
        'age',
        'id_major',
        'is_active',
    ];

    public function major(){
        return $this->belongsTo('App\Major','id_major');
    }

    public function tingkat_pendidikan(){
        return $this->belongsTo('App\TingkatPendidikan','id_tingkat_pendidikan');
    }
}
