<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale_quote extends Model
{
    protected $fillable = [
        'quote_date', 'quote_code', 'client_id','ocean_air_type', 'air_rate_id',
        'air_validity_date', 'air_price','air_currency_id', 'air_aol_id','air_aod_id',
        'air_slide_range', 'air_notes',
        'ocean_rate_id', 'ocean_price','ocean_validity_date',
        'ocean_currency_id', 'ocean_pol_id','ocean_pod_id', 'ocean_container_id','ocean_transit_time',
        'ocean_notes', 
        'trucking_rate_id','trucking_company', 'trucking_validity_date','trucking_pol_id',
        'trucking_pod_id', 'trucking_notes','faradany_price', 'faradany_currency_id','trailer_price',
        'trailer_currency_id', 'grar_price','grar_currency_id', 'hrf_price','hrf_currency_id',
        'clearance_price', 'clearance_currency_id','clearance_notes', 'door_door_price','door_door_currency_id','door_door_notes'
     
    ];
    public function client()
    {
        return $this->belongsTo('App\Models\Client','client_id');

    }
   

    public function air()
    {
        return $this->belongsTo('App\Models\Air_rate','air_rate_id');

    }


     
    public function airCurrency()
    {
        return $this->belongsTo('App\Models\Currency','air_currency_id');

    }
    public function airAol()
    {
        return $this->belongsTo('App\Models\Port','air_aol_id');

    }
    public function airAod()
    {
        return $this->belongsTo('App\Models\Port','air_aod_id');

    }

    public function ocean()
    {
        return $this->belongsTo('App\Models\Ocean_freight_rate','ocean_rate_id');

    }
    public function oceanCurrency()
    {
        return $this->belongsTo('App\Models\Currency','ocean_currency_id');

    }
    public function oceanAol()
    {
        return $this->belongsTo('App\Models\Port','ocean_pol_id');

    }
    public function oceanAod()
    {
        return $this->belongsTo('App\Models\Port','ocean_pod_id');

    }
 
    public function oceanContainer()
    {
        return $this->belongsTo('App\Models\Container','ocean_container_id');

    }





    public function trucking()
    {
        return $this->belongsTo('App\Models\Trucking_rate','trucking_rate_id');

    }



  
    public function truckingpol()
    {
        return $this->belongsTo('App\Models\Port','trucking_pol_id');

    }
    public function truckingpod()
    {
        return $this->belongsTo('App\Models\Port','trucking_pod_id');

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

    public function clearance()
    {
        return $this->belongsTo('App\Models\Currency','clearance_currency_id');

    }
    public function door()
    {
        return $this->belongsTo('App\Models\Currency','door_door_currency_id');

    }

  
}
