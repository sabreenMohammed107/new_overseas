@extends('layout.main')

@section('crumb')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href=""><i class="material-icons"></i> {{ __(' Home') }} </a></li>
    </ol>
</nav>

@endsection

@section('content')

<div class="row">
    <style>
        .hide {
            display: none;
        }
    </style>

    <div class="col-md-12">
        <div class="ms-panel">
            <div class="ms-panel-header d-flex justify-content-between">
                <h6>Sale Quote</h6>
                <!-- <a href="add_cource.html" class="btn btn-dark" > add Course </a> -->
            </div>
            <div class="ms-panel-body">
                <form action="{{route('sale-quote.update',$row->id)}}" method="POST">

                    {{ csrf_field() }}

                    @method('PUT')

                    <div class="row">

                        <div class="col-md-4 mb-3">
                            <div class="ui-widget form-group">
                                <label>Client</label>
                                <select name="client_id" class=" form-control" data-live-search="true" disabled>
                                    <option value="">
                                        @if($row->client)
                                        {{$row->client->client_name}}
                                        @endif

                                    </option>
                                    @foreach ($clients as $type)
                                    <option value='{{$type->id}}'>
                                        {{ $type->client_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
							<div class="form-group">
								<label class="exampleInputPassword1" for="exampleCheck1">Quote Code</label>
								<input type="text" class="form-control" value="{{$row->quote_code}}" placeholder="Quote Code" disabled>
							</div>
						</div>
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <?php $date = date_create($row->quote_date) ?>
                                <label class="exampleInputPassword1" for="exampleCheck1">Quote Date</label>
                                <input type="date" class="form-control" disabled value="{{ date_format($date,'Y-m-d') }}" name="quote_date" placeholder="Quote Date">
                            </div>
                        </div>
                    </div>
                    <div style="margin-bottom:25px">
                        <div style="border-bottom:solid 2px #0094ff;width:160px">
                            @if($row->ocean_air_type==0)
                            <input type="radio" name="tab" value="igotnone" onclick="show1();" checked /> Air
                            <input type="radio" name="tab" value="igottwo" onclick="show2();" clicked="clicked" /> Ocean
                            <style>
                                #div1 {
                                    display: none;
                                }

                                #div2 {
                                    display: block;
                                }
                            </style>
                            @else
                            <input type="radio" name="tab" value="igotnone" onclick="show1();" clicked="clicked" /> Air
                            <input type="radio" name="tab" value="igottwo" onclick="show2();" checked /> Ocean

                            <style>
                                #div1 {
                                    display: block;
                                }

                                #div2 {
                                    display: none;
                                }
                            </style>

                            @endif

                        </div>

                        <!--<div id="div1" class="hide">
						<hr><p>Okay Cool! Here are those two...111111</p>
						<input type="checkbox" value="Yes" name="one"> One &nbsp;
						<input type="checkbox" value="Yes" name="two"> Two
					</div>-->
                    </div>
                    <div class="ms-auth-container row no-gutters">
                        <div class="col-12 p-3">
                            <div id="div2">
                                <div class="ms-auth-container row">
                                    <div class="col-md-6 mb-3">
                                        <div class="ui-widget form-group">
                                            <label>Air Carrier</label>
                                            <select name="air_rate_id" class="airCarrier form-control" data-live-search="true">
                                                <option value="">
                                                    @if($row->air)
                                                    {{$row->air->code}}
                                                    @endif
                                                </option>
                                                @foreach ($airs as $type)
                                                <option value='{{$type->id}}'>
                                                    <!-- @if($type->carrier) -->
                                                    {{ $type->code}}
                                                    <!-- @endif -->
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3"></div>

                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label class="exampleInputPassword1" for="exampleCheck1">Price</label>
                                            <input type="text" name="air_price" value="{{$row->air_price}}" class="form-control" placeholder="Price">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="ui-widget form-group">
                                            <label>Currency</label>
                                            <select name="air_currency_id" class=" form-control" data-live-search="true">
                                                <option value="">
                                                    @if($row->airCurrency)
                                                    {{$row->$row->airCurrency->currency_name}}
                                                    @endif
                                                </option>
                                                @foreach ($currencies as $type)
                                                <option value='{{$type->id}}'>
                                                    {{ $type->currency_name}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label class="exampleInputPassword1" for="exampleCheck1">Aol</label>
                                            <input type="text" id="air_aol_id" value="{{$row->air ? $row->air->aol->port_name :''  }}" name="air_aol_id" class="form-control" placeholder="Aol" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label class="exampleInputPassword1" for="exampleCheck1">Aod</label>
                                            <input type="text" id="air_aod_id" name="air_aod_id" value="{{$row->air ? $row->air->aod->port_name :''  }}" class="form-control" placeholder="Aod" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label class="exampleInputPassword1" for="exampleCheck1">Slide Range</label>
                                            <input type="text" id="air_slide_range" name="air_slide_range" value="{{$row->air ? $row->air->slide_range :''  }}" class="form-control" placeholder="Slide Range" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <?php $date = date_create($row->air_validity_date) ?>
                                            <label class="exampleInputPassword1" for="exampleCheck1">Validitiy Date</label>
                                            <input type="date" id="air_validity_date" value="{{ $row->air ? date_format($date,'Y-m-d'):'' }}" name="air_validity_date" class="form-control" placeholder="Validitiy Date" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label class="exampleInputPassword1" for="exampleCheck1">Notes</label>
                                            <textarea id="air_notes" name="air_notes" class="form-control" placeholder="Notes" rows="3" disabled>{{$row->air ? $row->air->notes :''  }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="div1" class="hide">
                                <div class="ms-auth-container row">
                                    <div class="col-md-6 mb-3">
                                        <div class="ui-widget form-group">
                                            <label>Ocean Freigt Carrier</label>
                                            <select name="ocean_rate_id" class="oceanCarrier form-control" data-live-search="true">
                                                <option value=""> 
                                                    @if($row->ocean)
                                                    {{$row->ocean->code}}
                                                    @endif
                                                </option>
                                                @foreach ($oceans as $type)
                                                <option value='{{$type->id}}'>
                                                    <!-- @if($type->carrier) -->
                                                    {{ $type->code}}
                                                    <!-- @endif -->
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3"></div>

                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label class="exampleInputPassword1" for="exampleCheck1">Price</label>
                                            <input type="number" name="ocean_price" value="{{$row->ocean_price}}" class="form-control" placeholder="Price">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="ui-widget form-group">
                                            <label>Currency</label>
                                            <select id="ocean_currency_id" name="ocean_currency_id" class=" form-control" data-live-search="true">
                                                <option value=""> @if($row->oceanCurrency)
                                                    {{$row->oceanCurrency->currency_name}}
                                                    @endif</option>
                                                @foreach ($oceancurrencies as $type)
                                                <option value='{{$type->id}}'>

                                                    {{ $type->currency_name}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label class="exampleInputPassword1" for="exampleCheck1">Pol</label>
                                            <input type="text" name="ocean_pol_id" value="{{$row->oceanAol ? $row->oceanAol->port_name :''  }}" id="ocean_pol_id" class="form-control" placeholder="Pol" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label class="exampleInputPassword1" for="exampleCheck1">Pod</label>
                                            <input type="text" name="ocean_pod_id" id="ocean_pod_id" value="{{$row->oceanAod ? $row->oceanAod->port_name :''  }}" class="form-control" placeholder="Pod" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label class="exampleInputPassword1" for="exampleCheck1">Container</label>
                                            <input type="text" name="ocean_container_id" id="ocean_container_id" value="{{$row->oceanContainer ? $row->oceanContainer->container_size.'-'.$row->oceanContainer->container_type :''  }}" class="form-control" placeholder="Container" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label class="exampleInputPassword1" for="exampleCheck1">Transit Time</label>
                                            <input type="number" name="ocean_transit_time" id="ocean_transit_time" value="{{$row->ocean ? $row->ocean_transit_time :''  }}" class="form-control" placeholder="Transit Time" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <?php $date = date_create($row->ocean_validity_date) ?>
                                            <label class="exampleInputPassword1" for="exampleCheck1">Validitiy Date</label>
                                            <input type="date" name="ocean_validity_date" value="{{ date_format($date,'Y-m-d') }}" id="ocean_validity_date" class="form-control" placeholder="Validitiy Date" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label class="exampleInputPassword1" for="exampleCheck1">Notes</label>
                                            <textarea name="ocean_notes" id="ocean_notes" class="form-control" placeholder="Notes" rows="3" disabled>{{$row->ocean ? $row->ocean_notes :''  }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div style="border-bottom:solid 2px #0094ff;margin-bottom:20px"></div>
                                <div class="ms-auth-container row">
                                    <div class="col-md-6 mb-3">
                                        <div class="ui-widget form-group">
                                            <label>Trucking Rate</label>
                                            <select name="trucking_rate_id" class="truckingCarrier form-control" data-live-search="true">
                                                <option value="">
                                                     @if($row->trucking)
                                                    {{$row->trucking->code}}
                                                    @endif</option>
                                                @foreach ($truckings as $type)
                                                <option value='{{$type->id}}'>
                                                    <!-- @if($type->supplier) -->
                                                    {{ $type->code}}
                                                    <!-- @endif -->
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3"></div>
                                    <!-- <div class="col-md-6 mb-3">
										<div class="form-group">
											<label class="exampleInputPassword1" for="exampleCheck1">Trucking Company</label>
											<input type="text" class="form-control" placeholder="Trucking Company" disabled>
										</div>
									</div> -->
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <?php $date = date_create($row->trucking_validity_date) ?>
                                            <label class="exampleInputPassword1" for="exampleCheck1">Validitiy Date</label>
                                            <input type="date" id="trucking_validity_date" value="{{ date_format($date,'Y-m-d') }}" name="trucking_validity_date" class="form-control" placeholder="Validitiy Date" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label class="exampleInputPassword1" for="exampleCheck1">Pol</label>
                                            <input type="text" id="trucking_pol_id" value="{{$row->truckingpol ? $row->truckingpol->port_name :''  }}" name="trucking_pol_id" class="form-control" placeholder="Pol" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label class="exampleInputPassword1" for="exampleCheck1">Pod</label>
                                            <input type="text" id="trucking_pod_id" value="{{$row->truckingpod ? $row->truckingpod->port_name :''  }}" name="trucking_pod_id" class="form-control" placeholder="Pod" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label class="exampleInputPassword1" for="exampleCheck1">Notes</label>
                                            <textarea id="trucking_notes" name="trucking_notes" class="form-control" placeholder="Notes" disabled rows="3">{{$row->trucking ? $row->trucking_notes :''  }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label class="exampleInputPassword1" for="exampleCheck1">*Faradany Price</label>
                                            <input type="number" value="{{$row->faradany_price}}" name="faradany_price" class="form-control" placeholder="Faradany Price">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="ui-widget form-group">
                                            <label>Faradany Currency</label>
                                            <select name="faradany_currency_id" class=" form-control" data-live-search="true">
                                                <option value="">@if($row->faradany)
                                                    {{$row->faradany->currency_name}}
                                                    @endif</option>
                                                @foreach ($faradanies as $type)
                                                <option value='{{$type->id}}'>
                                                    {{ $type->currency_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label class="exampleInputPassword1" for="exampleCheck1">*Trailer Price</label>
                                            <input type="number" value="{{$row->trailer_price}}" name="trailer_price" class="form-control" placeholder="Trailer Price">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="ui-widget form-group">
                                            <label>Trailer Currency</label>
                                            <select name="trailer_currency_id" class=" form-control" data-live-search="true">
                                                <option value="">@if($row->trailer)
                                                {{$row->trailer->currency_name}}
                                                @endif</option>
                                                @foreach ($trailers as $type)
                                                <option value='{{$type->id}}'>
                                                    {{ $type->currency_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label class="exampleInputPassword1" for="exampleCheck1">*Grar Price</label>
                                            <input type="number" value="{{$row->grar_price}}" name="grar_price" class="form-control" placeholder="Grar Price">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="ui-widget form-group">
                                            <label>Grar Currency</label>
                                            <select name="grar_currency_id" class=" form-control" data-live-search="true">
                                                <option value="">@if($row->grar)
                                                {{$row->grar->currency_name}}
                                                @endif</option>
                                                @foreach ($grars as $type)
                                                <option value='{{$type->id}}'>
                                                    {{ $type->currency_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label class="exampleInputPassword1" for="exampleCheck1">*HRF Price</label>
                                            <input type="number" value="{{$row->hrf_price}}" name="hrf_price" class="form-control" placeholder="HRF Price">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="ui-widget form-group">
                                            <label>HRF Currency</label>
                                            <select name="hrf_currency_id" class="form-control" data-live-search="true">
                                                <option value="">@if($row->hrf)
                                                {{$row->hrf->currency_name}}
                                                @endif</option>
                                                @foreach ($hrfs as $type)
                                                <option value='{{$type->id}}'>
                                                    {{ $type->currency_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div>
                                <div style="border-bottom:solid 2px #0094ff;margin-bottom:20px"></div>
                                <div class="ms-auth-container row">
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label class="exampleInputPassword1" for="exampleCheck1">*Clearance Price</label>
                                            <input type="number" value="{{$row->clearance_price}}" name="clearance_price" class="form-control" placeholder="Clearance Price">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="ui-widget form-group">
                                            <label>Clearance Currency</label>
                                            <select name="clearance_currency_id" class="form-control" data-live-search="true">
                                                <option value="">@if($row->clearance)
                                                {{$row->clearance->currency_name}}
                                                @endif</option>
                                                @foreach ($clearances as $type)
                                                <option value='{{$type->id}}'>
                                                    {{ $type->currency_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label class="exampleInputPassword1" for="exampleCheck1">Clearance Notes</label>
                                            <textarea name="clearance_notes" class="form-control" placeholder="Notes" rows="3">{{$row->clearance_notes}}</textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div>
                                <div style="border-bottom:solid 2px #0094ff;margin-bottom:20px"></div>
                                <div class="ms-auth-container row">
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label class="exampleInputPassword1" for="exampleCheck1">*Door to Door Price</label>
                                            <input type="number" value="{{$row->door_door_price}}" name="door_door_price" class="form-control" placeholder="Door to Door Price">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="ui-widget form-group">
                                            <label>Door Currency</label>
                                            <select name="door_door_currency_id" class="form-control" data-live-search="true">
                                                <option value="">@if($row->door)
                                                {{$row->door->currency_name}}
                                                @endif</option>
                                                @foreach ($doors as $type)
                                                <option value='{{$type->id}}'>
                                                    {{ $type->currency_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label class="exampleInputPassword1" for="exampleCheck1">Door to Door notes</label>
                                            <textarea name="door_door_notes" class="form-control" placeholder="Notes" rows="3">{{$row->door_door_notes}}</textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="input-group d-flex justify-content-end text-center">
                                <a href="{{ route('sale-quote.index') }}" class="btn btn-dark mx-2"> Cancel</a>
                                <!-- <input type="button" value="Cancel" class="btn btn-dark mx-2" data-dismiss="modal" aria-label="Close"> -->
                                <input type="submit" value="Add" class="btn btn-success ">
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.row -->


</div>
@endsection
@section('scripts')


<!--radio button-->
<script>
    function show1() {
        document.getElementById('div1').style.display = 'none';
        document.getElementById('div2').style.display = 'block';
    }

    function show2() {
        document.getElementById('div2').style.display = 'none';
        document.getElementById('div1').style.display = 'block';
    }
</script>
<!--/radio button-->


<script>
    $(document).ready(function() {
        //air
        $('.airCarrier').change(function() {

            if ($(this).val() != '') {
                var select = $(this).attr("id");
                var value = $(this).val();



                $.ajax({
                    url: "{{route('fetchAir')}}",
                    method: "get",
                    data: {
                        select: select,
                        value: value
                    },
                    success: function(result) {

                        $('#air_aol_id').val(result[0]);
                        $('#air_aod_id').val(result[1]);
                        $('#air_slide_range').val(result[2]);
                        $('#air_validity_date').val(result[3]);
                        $('#air_notes').html(result[4]);

                    }

                })
            }
        });

        //ocean
        $('.oceanCarrier').change(function() {

            if ($(this).val() != '') {
                var select = $(this).attr("id");
                var value = $(this).val();



                $.ajax({
                    url: "{{route('fetchOcean')}}",
                    method: "get",
                    data: {
                        select: select,
                        value: value
                    },
                    success: function(result) {

                        $('#ocean_pol_id').val(result[0]);
                        $('#ocean_pod_id').val(result[1]);
                        $('#ocean_container_id').val(result[2]);
                        $('#ocean_validity_date').val(result[3]);
                        $('#ocean_notes').html(result[4]);
                        $('#ocean_transit_time').val(result[5]);

                    }

                })
            }
        });

        //trucking
        $('.truckingCarrier').change(function() {

            if ($(this).val() != '') {
                var select = $(this).attr("id");
                var value = $(this).val();



                $.ajax({
                    url: "{{route('fetchTrucking')}}",
                    method: "get",
                    data: {
                        select: select,
                        value: value
                    },
                    success: function(result) {

                        $('#trucking_pol_id').val(result[0]);
                        $('#trucking_pod_id').val(result[1]);
                        $('#trucking_validity_date').val(result[2]);
                        $('#trucking_notes').html(result[3]);


                    }

                })
            }
        });




    });
</script>
@endsection