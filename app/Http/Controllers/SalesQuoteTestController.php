<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Port;
use App\Models\Sale_quote;
use App\Models\Client;
use App\Models\Ocean_freight_rate;
use App\Models\Air_rate;
use App\Models\Currency;
use App\Models\Trucking_rate;
use App\Models\Carrier;
use App\Models\Container;
use File;
use DB;
use Log;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
class SalesQuoteTestController extends Controller
{
    protected $object;

    protected $viewName;
    protected $routeName;
    protected $message;
    protected $errormessage;

    public function __construct(Sale_quote $object)
    {
        // $this->middleware('auth');

        $this->object = $object;
        $this->viewName = 'sale-quoteTest.';
        $this->routeName = 'sale-quoteTest.';
        $this->message = 'The Data has been saved';
        $this->errormessage = 'check Your Data ';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = Sale_quote::orderBy("created_at", "Desc")->get();

        return view($this->viewName . 'index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::all();
        $airs = Air_rate::all();
        $carriers = Carrier::all();
        $aols = Port::all();
        $aods = Port::all();
        $oceans = Ocean_freight_rate::all();
        $currencies = Currency::all();
        $oceancurrencies = Currency::all();
        $faradanies = Currency::all();
        $trailers = Currency::all();
        $grars = Currency::all();
        $hrfs = Currency::all();
        $truckings = Trucking_rate::all();
        $clearances = Currency::all();
        $doors = Currency::all();
        $containers = Container::all();
        return view($this->viewName . 'createSelect', compact(
            'clients','carriers','aols','aods','containers',
            'airs',
            'oceancurrencies',
            'oceans',
            'currencies',
            'faradanies',
            'trailers',
            'grars',
            'hrfs',
            'truckings',
            'clearances',
            'doors'
        ));
    }

    public function gotosave(Request $request){
        $clients = Client::all();
        $airs = Air_rate::all();
        $carriers = Carrier::all();
        $aols = Port::all();
        $aods = Port::all();
        $oceans = Ocean_freight_rate::all();
        $currencies = Currency::all();
        $oceancurrencies = Currency::all();
        $faradanies = Currency::all();
        $trailers = Currency::all();
        $grars = Currency::all();
        $hrfs = Currency::all();
        $truckings = Trucking_rate::all();
        $clearances = Currency::all();
        $doors = Currency::all();
       

        return view($this->viewName . 'create', compact(
            'clients','carriers','aols','aods',
            'airs',
            'oceancurrencies',
            'oceans',
            'currencies',
            'faradanies',
            'trailers',
            'grars',
            'hrfs',
            'truckings',
            'clearances',
            'doors'
        ));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //get max code
        $max = 0;

        $maxValue = Sale_quote::orderBy('id', 'desc')->value('quote_code');
        if ($maxValue != null) {
            $max = $maxValue + 1;
        } else {
            $max = 100;
        }
        //get type
        $type = 0;
        if ($request->input('tab') === "igotnone") {
            $type = 0;
        } else {
            $type = 1;
        }


        $data = [
            'quote_date' => Carbon::parse($request->input('quote_date')),
            'quote_code' => $max,
            'ocean_air_type' => $type,
           
          
            'faradany_price' => $request->input('faradany_price'),
            'trailer_price' => $request->input('trailer_price'),
            'grar_price' => $request->input('grar_price'),
            'hrf_price' => $request->input('hrf_price'),
            'clearance_price' => $request->input('clearance_price'),
            'clearance_notes' => $request->input('clearance_notes'),
            'door_door_price' => $request->input('door_door_price'),
            'door_door_notes' => $request->input('door_door_notes'),



        ];
        if ($request->input('client_id')) {

            $data['client_id'] = $request->input('client_id');
        }
        if ($request->input('supplier_type_id')) {

            $data['supplier_type_id'] = $request->input('supplier_type_id');
        }
        if ($type == 0) {
            if ($request->input('code')) {
                $air_id=Air_rate::where('code',$request->input('code'))->first();
                $data['air_rate_id'] = $air_id->id;
                $dataAir = Air_rate::where('code',$request->input('code'))->first();
                $data['air_aol_id'] = $dataAir->aol_id;
                $data['air_aod_id'] = $dataAir->aod_id;
                $data['air_slide_range'] = $dataAir->slide_range;
                $data['air_notes'] = $dataAir->notes;
                $data['air_validity_date'] = $dataAir->validity_date;
            }
            if ($request->input('air_currency_id')) {

                $data['air_currency_id'] = $request->input('air_currency_id');
            }
            $data['air_price']  = $request->input('air_price');
        }

      
        if ($type = 1) {
            if ($request->input('codeOcean')) {
                $ocean_id=Ocean_freight_rate::where('code',$request->input('codeOcean'))->first();
                $data['ocean_rate_id'] = $ocean_id->id;
                $dataOcean = Ocean_freight_rate::where('code',$request->input('codeOcean'))->first();
                $data['ocean_pol_id'] = $dataOcean->pol_id;
                $data['ocean_pod_id'] = $dataOcean->pod_id;
                $data['ocean_container_id'] = $dataOcean->container_id;
                $data['ocean_notes'] = $dataOcean->notes;
                $data['ocean_validity_date'] = $dataOcean->validity_date;
                $data['ocean_transit_time'] = $dataOcean->transit_time;
            }
            if ($request->input('ocean_currency_id')) {

                $data['ocean_currency_id'] = $request->input('ocean_currency_id');
            }
            $data['ocean_price']  = $request->input('ocean_price');
        }
      

        if ($request->input('codetracking')) {
            $tracking_id=Trucking_rate::where('code',$request->input('codetracking'))->first();
            $data['trucking_rate_id'] = $tracking_id->id;
            $dataTrucking = Trucking_rate::where('code',$request->input('codetracking'))->first();
     
            $data['trucking_pol_id'] = $dataTrucking->pol_id;
            $data['trucking_pod_id'] = $dataTrucking->pod_id;
            $data['trucking_notes'] = $dataTrucking->notes;
            $data['trucking_validity_date'] = $dataTrucking->validity_date;
        }
        if ($request->input('faradany_currency_id')) {

            $data['faradany_currency_id'] = $request->input('faradany_currency_id');
        }
        if ($request->input('trailer_currency_id')) {

            $data['trailer_currency_id'] = $request->input('trailer_currency_id');
        }
        if ($request->input('grar_currency_id')) {

            $data['grar_currency_id'] = $request->input('grar_currency_id');
        }
        if ($request->input('hrf_currency_id')) {

            $data['hrf_currency_id'] = $request->input('hrf_currency_id');
        }

        if ($request->input('clearance_currency_id')) {

            $data['clearance_currency_id'] = $request->input('clearance_currency_id');
        }

        if ($request->input('door_door_currency_id')) {

            $data['door_door_currency_id'] = $request->input('door_door_currency_id');
        }

        $this->object::create($data);



        return redirect()->route($this->routeName . 'index')->with('flash_success', $this->message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = Sale_quote::where('id', '=', $id)->first();
        $clients = Client::all();
        $airs = Air_rate::all();
        $oceans = Ocean_freight_rate::all();
        $currencies = Currency::all();
        $oceancurrencies = Currency::all();
        $faradanies = Currency::all();
        $trailers = Currency::all();
        $grars = Currency::all();
        $hrfs = Currency::all();
        $truckings = Trucking_rate::all();
        $clearances = Currency::all();
        $doors = Currency::all();
        return view($this->viewName . 'edit', compact(
            'clients',
            'row',
            'airs',
            'oceancurrencies',
            'oceans',
            'currencies',
            'faradanies',
            'trailers',
            'grars',
            'hrfs',
            'truckings',
            'clearances',
            'doors'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $row = Sale_quote::where('id', '=', $id)->first();
         //get type
         $type = 0;
         if ($request->input('tab') === "igotnone") {
             $type = 0;
         } else {
             $type = 1;
         }
 
 
         $data = [
             'quote_date' => Carbon::parse($request->input('quote_date')),
          
             'ocean_air_type' => $type,
            
           
             'faradany_price' => $request->input('faradany_price'),
             'trailer_price' => $request->input('trailer_price'),
             'grar_price' => $request->input('grar_price'),
             'hrf_price' => $request->input('hrf_price'),
             'clearance_price' => $request->input('clearance_price'),
             'clearance_notes' => $request->input('clearance_notes'),
             'door_door_price' => $request->input('door_door_price'),
             'door_door_notes' => $request->input('door_door_notes'),
 
 
 
         ];
         if ($request->input('client_id')) {
 
             $data['client_id'] = $request->input('client_id');
         }
         if ($request->input('supplier_type_id')) {
 
             $data['supplier_type_id'] = $request->input('supplier_type_id');
         }
         if ($type == 0) {
             if ($request->input('code')) {
                 $air_id=Air_rate::where('code',$request->input('code'))->first();
                 $data['air_rate_id'] = $air_id->id;
                 $dataAir = Air_rate::where('code',$request->input('code'))->first();
                 $data['air_aol_id'] = $dataAir->aol_id;
                 $data['air_aod_id'] = $dataAir->aod_id;
                 $data['air_slide_range'] = $dataAir->slide_range;
                 $data['air_notes'] = $dataAir->notes;
                 $data['air_validity_date'] = $dataAir->validity_date;
             }
             if ($request->input('air_currency_id')) {
 
                 $data['air_currency_id'] = $request->input('air_currency_id');
             }
             $data['air_price']  = $request->input('air_price');
         }
 
       
         if ($type = 1) {
             if ($request->input('codeOcean')) {
                 $ocean_id=Ocean_freight_rate::where('code',$request->input('codeOcean'))->first();
                 $data['ocean_rate_id'] = $ocean_id->id;
                 $dataOcean = Ocean_freight_rate::where('code',$request->input('codeOcean'))->first();
                 $data['ocean_pol_id'] = $dataOcean->pol_id;
                 $data['ocean_pod_id'] = $dataOcean->pod_id;
                 $data['ocean_container_id'] = $dataOcean->container_id;
                 $data['ocean_notes'] = $dataOcean->notes;
                 $data['ocean_validity_date'] = $dataOcean->validity_date;
                 $data['ocean_transit_time'] = $dataOcean->transit_time;
             }
             if ($request->input('ocean_currency_id')) {
 
                 $data['ocean_currency_id'] = $request->input('ocean_currency_id');
             }
             $data['ocean_price']  = $request->input('ocean_price');
         }
       
 
         if ($request->input('codetracking')) {
             $tracking_id=Trucking_rate::where('code',$request->input('codetracking'))->first();
             $data['trucking_rate_id'] = $tracking_id->id;
             $dataTrucking = Trucking_rate::where('code',$request->input('codetracking'))->first();
      
             $data['trucking_pol_id'] = $dataTrucking->pol_id;
             $data['trucking_pod_id'] = $dataTrucking->pod_id;
             $data['trucking_notes'] = $dataTrucking->notes;
             $data['trucking_validity_date'] = $dataTrucking->validity_date;
         }
         if ($request->input('faradany_currency_id')) {
 
             $data['faradany_currency_id'] = $request->input('faradany_currency_id');
         }
         if ($request->input('trailer_currency_id')) {
 
             $data['trailer_currency_id'] = $request->input('trailer_currency_id');
         }
         if ($request->input('grar_currency_id')) {
 
             $data['grar_currency_id'] = $request->input('grar_currency_id');
         }
         if ($request->input('hrf_currency_id')) {
 
             $data['hrf_currency_id'] = $request->input('hrf_currency_id');
         }
 
         if ($request->input('clearance_currency_id')) {
 
             $data['clearance_currency_id'] = $request->input('clearance_currency_id');
         }
 
         if ($request->input('door_door_currency_id')) {
 
             $data['door_door_currency_id'] = $request->input('door_door_currency_id');
         }

        $this->object::findOrFail($id)->update($data);

        return redirect()->route($this->routeName . 'index')->with('flash_success', $this->message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = Sale_quote::where('id', '=', $id)->first();


        try {
            $row->delete();
        } catch (QueryException $q) {

            return redirect()->back()->with('flash_danger', 'You cannot delete related with another...');
        }

        return redirect()->route($this->routeName . 'index')->with('flash_success', 'Data Has Been Deleted Successfully !');
    }


    public function fetchAir(Request $request)
    {
        $dataAjax = array();
        $select = $request->get('select');
        $value = $request->get('value');

        $data = Air_rate::where('code', $value)->first();

        array_push($dataAjax, $data->aol->port_name);
        array_push($dataAjax, $data->aod->port_name);
        array_push($dataAjax, $data->slide_range);
        $date = date_create($data->validity_date);
        $dd = date_format($date, 'Y-m-d');
        array_push($dataAjax, $dd);
        array_push($dataAjax, $data->notes);
        array_push($dataAjax, $data->carrier->carrier_name);
        array_push($dataAjax, $data->price);
        array_push($dataAjax, $data->currency->currency_name);

        return ($dataAjax);
    }

    public function fetchOcean(Request $request)
    {
        $dataAjax = array();
        $select = $request->get('select');
        $value = $request->get('value');

        $data = Ocean_freight_rate::where('code', $value)->first();

        array_push($dataAjax, $data->pol->port_name);
        array_push($dataAjax, $data->pod->port_name);
        $container = $data->container->container_size . '-' . $data->container->container_type;

        array_push($dataAjax, $container);
        $date = date_create($data->validity_date);
        $dd = date_format($date, 'Y-m-d');
        array_push($dataAjax, $dd);
        array_push($dataAjax, $data->notes);
        array_push($dataAjax, $data->transit_time);
        array_push($dataAjax, $data->carrier->carrier_name);
        array_push($dataAjax, $data->price);
        array_push($dataAjax, $data->currency->currency_name);


        return ($dataAjax);
    }

    public function fetchTrucking(Request $request)
    {
        $dataAjax = array();
        $select = $request->get('select');
        $value = $request->get('value');

        $data = Trucking_rate::where('code', $value)->first();

        array_push($dataAjax, $data->pol->port_name);
        array_push($dataAjax, $data->pod->port_name);

        $date = date_create($data->validity_date);
        $dd = date_format($date, 'Y-m-d');
        array_push($dataAjax, $dd);
        array_push($dataAjax, $data->notes);


        return ($dataAjax);
    }
}
