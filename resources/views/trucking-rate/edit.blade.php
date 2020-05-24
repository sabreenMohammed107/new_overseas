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
    <div class="col-md-12">



        <div class="ms-panel">
            <div class="ms-panel-header d-flex justify-content-between">
                <h6>Trucking Rates</h6>
                <!-- <a href="add_cource.html" class="btn btn-dark" > add Course </a> -->
            </div>
            <div class="ms-panel-body">
                <div class="ms-auth-container row no-gutters">
                    <div class="col-12 p-3">
                        <form action="{{route('trucking-rate.update',$row->id)}}" method="POST">

                            {{ csrf_field() }}

                            @method('PUT')
                            <div class="ms-auth-container row">
                                <div class="col-md-6 mb-3">
                                    <div class="ui-widget form-group">
                                        <label>Supplier</label>
                                        <select name="supplier_id" class=" form-control" data-live-search="true">
                                            <option value="">@if($row->supplier)
                                                {{$row->supplier->supplier_name}}
                                                @endif</option>
                                            @foreach ($suppliers as $type)
                                            <option value='{{$type->id}}'>
                                                {{ $type->supplier_name}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
							<div class="form-group">
								<label class="exampleInputPassword1" for="exampleCheck1"> Code</label>
								<input type="text" class="form-control" value="{{$row->code}}" placeholder="Code" disabled>
							</div>
						</div>
                                <div class="col-md-6 mb-3">
                                    <div class="ui-widget form-group">
                                        <label>Pol</label>
                                        <select name="pol_id" class=" form-control" data-live-search="true">
                                            <option value="">@if($row->pol)
                                                {{$row->pol->port_name}} - {{$row->pol->country->country_name}}
                                                @endif</option>
                                            @foreach ($pols as $type)
                                            <option value='{{$type->id}}'>
                                                {{ $type->port_name}} - {{$type->country->country_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="ui-widget form-group">
                                        <label>Pod</label>
                                        <select name="pod_id" class=" form-control" data-live-search="true">
                                            <option value="">@if($row->pod)
                                                {{$row->pod->port_name}} - {{$row->pod->country->country_name}}
                                                @endif</option>
                                            @foreach ($pods as $type)
                                            <option value='{{$type->id}}'>
                                                {{ $type->port_name}} - {{$type->country->country_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label class="exampleInputPassword1" for="exampleCheck1">*Faradany Price</label>
                                        <input type="number" name="faradany_price" value="{{$row->faradany_price}}" class="form-control" placeholder="Faradany Price">
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="ui-widget form-group">
                                        <label>Faradany Currency</label>
                                        <select name="faradany_currency_id" class="form-control" data-live-search="true">
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
                                        <input type="number" name="trailer_price" value="{{$row->trailer_price}}" class="form-control" placeholder="Trailer Price">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="ui-widget form-group">
                                        <label>Trailer Currency</label>
                                        <select name="trailer_currency_id" class="form-control" data-live-search="true">
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
                                        <input type="number" name="grar_price" value="{{$row->grar_price}}" class="form-control" placeholder="Grar Price">
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="ui-widget form-group">
                                        <label>Grar Currency</label>
                                        <select name="grar_currency_id" class="form-control" data-live-search="true">
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
                                        <label class="exampleInputPassword1" for="exampleCheck1">*40 HRF Price</label>
                                        <input type="number" name="hrf_price" value="{{$row->hrf_price}}" class="form-control" placeholder="40 HRF Price">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="ui-widget form-group">
                                        <label>40 HRF Currency</label>
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
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <?php $date = date_create($row->validity_date) ?>
                                        <label class="exampleInputPassword1" for="exampleCheck1">Validitiy Date</label>
                                        <input type="date" class="form-control" value="{{ date_format($date,'Y-m-d') }}" name="validity_date" placeholder="Validitiy Date">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label class="exampleInputPassword1" for="exampleCheck1">Notes</label>
                                        <textarea id="newClint" class="form-control" name="notes" placeholder="Notes" rows="3">{{$row->notes}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group d-flex justify-content-end text-center">
                                <a href="{{ route('trucking-rate.index') }}" class="btn btn-dark mx-2"> Cancel</a>
                                <input type="submit" value="Add" class="btn btn-success ">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.row -->


</div>
@endsection