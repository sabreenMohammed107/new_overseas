<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trucking_rate extends Model
{
    protected $fillable = [
        'trucking_company','pol_id', 'pod_id', 'faradany_price', 'faradany_currency_id',
        'trailer_price','trailer_currency_id',
        'grar_price','grar_currency_id','hrf_price','hrf_currency_id'
        ,'transit_time','validity_date','notes'
      
     
    ];
   
    public function pol()
    {
        return $this->belongsTo('App\Models\Port_type','pol_id');

    }
    public function pod()
    {
        return $this->belongsTo('App\Models\Port_type','pod_id');

    }
    public function faradany()
    {
        return $this->belongsTo('App\Models\Currency','faradany_currency_id');

    }
    public function trailer()
    {
        return $this->belongsTo('App\Models\Currency','trailer_currency_id');

    }

    public function grar()
    {
        return $this->belongsTo('App\Models\Currency','grar_currency_id');

    }
    public function hrf()
    {
        return $this->belongsTo('App\Models\Currency','hrf_currency_id');

    }
}
