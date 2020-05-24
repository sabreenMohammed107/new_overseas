<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trucking_rate;

use App\Models\Port;
use App\Models\Supplier;
use App\Models\Currency;
use File;
use DB;
use Log;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
class TruckingRateController extends Controller
{
    protected $object;

    protected $viewName;
    protected $routeName;
    protected $message;
    protected $errormessage;

    public function __construct(Trucking_rate $object)
    {
        // $this->middleware('auth');

        $this->object = $object;
        $this->viewName = 'trucking-rate.';
        $this->routeName = 'trucking-rate.';
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
        $rows = Trucking_rate::orderBy("created_at", "Desc")->get();
       
        $pols = Port::all();
        $pods = Port::all();
        $faradanies = Currency::all();
        $trailers = Currency::all();
        $grars = Currency::all();
        $hrfs = Currency::all();
       $suppliers=Supplier::where('supplier_type_id','=',1)->get();

        return view($this->viewName . 'index', compact('rows','suppliers', 'pols', 'pods', 'faradanies', 'trailers','grars','hrfs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

          $maxValue = Trucking_rate::orderBy('id', 'desc')->value('code');
          if ($maxValue != null) {
              $max = $maxValue + 1;
          } else {
              $max = 100;
          }
        $data = [
            'code'=>$max,
            'faradany_price' => $request->input('faradany_price'),
            'trailer_price' => $request->input('trailer_price'),
            'grar_price' => $request->input('grar_price'),
            'hrf_price' => $request->input('hrf_price'),
            'transit_time' => $request->input('transit_time'),
            'notes' => $request->input('notes'),
            'validity_date'=>Carbon::parse($request->input('validity_date')),
           

        ];
      
        if ($request->input('supplier_id')) {

            $data['supplier_id'] = $request->input('supplier_id');
        }
        if ($request->input('pol_id')) {

            $data['pol_id'] = $request->input('pol_id');
        }
        if ($request->input('pod_id')) {

            $data['pod_id'] = $request->input('pod_id');
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
        $row = Trucking_rate::where('id', '=', $id)->first();
       
        $pols = Port::all();
        $pods = Port::all();
        $faradanies = Currency::all();
        $trailers = Currency::all();
        $grars = Currency::all();
        $hrfs = Currency::all();
        $suppliers=Supplier::where('supplier_type_id','=',1)->get();

        return view($this->viewName . 'edit', compact('row','suppliers', 'pols', 'pods', 'faradanies', 'trailers','grars','hrfs'));
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
        $data = [
          
            'faradany_price' => $request->input('faradany_price'),
            'trailer_price' => $request->input('trailer_price'),
            'grar_price' => $request->input('grar_price'),
            'hrf_price' => $request->input('hrf_price'),
            'transit_time' => $request->input('transit_time'),
            'notes' => $request->input('notes'),
            'validity_date'=>Carbon::parse($request->input('validity_date')),
           

        ];
        if ($request->input('supplier_id')) {

            $data['supplier_id'] = $request->input('supplier_id');
        }
        if ($request->input('pol_id')) {

            $data['pol_id'] = $request->input('pol_id');
        }
        if ($request->input('pod_id')) {

            $data['pod_id'] = $request->input('pod_id');
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
        $row = Trucking_rate::where('id', '=', $id)->first();
       

        try {
            $row->delete();
          
        } catch (QueryException $q) {

            return redirect()->back()->with('flash_danger', 'You cannot delete related with another...');
        }

        return redirect()->route($this->routeName . 'index')->with('flash_success', 'Data Has Been Deleted Successfully !');
    }
    
}
