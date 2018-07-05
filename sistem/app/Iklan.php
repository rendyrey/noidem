<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Carbon\Carbon;

class Iklan extends Model
{
    protected $table = 'iklan';
    protected $primaryKey = 'id';
    protected $fillable = ['id_kategori','id_media','plan_start_date','plan_end_date','actual_start_date','actual_end_date','domain','event_code'];

    public function advertising_category()
    {
        return $this->belongsTo('App\AdvertisingCategory', 'id_kategori');
    }

    public function advertising_media()
    {
        return $this->belongsTo('App\AdvertisingMedia', 'id_media');
    }

    public function loker()
    {
        return $this->hasMany('App\Loker', 'id_iklan');
    }

    public function tanggal_psychotest()
    {
        return $this->hasMany('App\TanggalPsychotest', 'id_iklan');
    }

    public function pelamar()
    {
        return $this->hasMany('App\Pelamar', 'id_iklan');
    }

    public static function job_interest()
    {
        $job_interest = DB::table('iklan')
            ->join('loker', 'iklan.id', '=', 'loker.id_iklan')
            ->select('loker.*', 'iklan.id')
            ->where('iklan.actual_end_date', '>=', Carbon::today())
            ->where('iklan.domain','formlamaran.medion.co.id')
            ->get();

        return $job_interest;
    }

    public static function job_interest_jobfair(){
      $job_interest = DB::table('iklan')
          ->join('loker', 'iklan.id', '=', 'loker.id_iklan')
          ->select('loker.*', 'iklan.id')
          ->where('iklan.actual_end_date', '>=', Carbon::today())
          ->where('iklan.domain','jobfair.medion.co.id')
          ->get();

      return $job_interest;
    }
}
