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
                <a href="#" class="btn btn-dark" data-toggle="modal" data-target="#addSubCat"> add new </a>
            </div>
            <div class="ms-panel-body">
                <div class="table-responsive">
                    <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Trucking Company</th>
                                <th>Pol</th>
                                <th>Pod</th>
                                <th>Faradany Price</th>
                                <th>Faradany Currency</th>
                                <th>Trailer Price</th>
                                <th>Trailer Currency</th>
                                <th>Grar Price</th>
                                <th>Grar Currency</th>
                                <th>40 HRF Price</th>
                                <th>40 HRF Currency</th>
                                <th>Validity Date</th>

                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rows as $index => $row)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$row->trucking_company}}</td>
                                <td>@if($row->pol)
                                    {{$row->pol->port_type}}
                                    @endif</td>
                                <td>@if($row->pod)
                                    {{$row->pod->port_type}}
                                    @endif</td>
                                <td>{{$row->faradany_price}}</td>
                                <td>@if($row->faradany)
                                    {{$row->faradany->currency_name}}
                                    @endif</td>
                                <td>{{$row->trailer_price}}</td>
                                <td>@if($row->trailer)
                                    {{$row->trailer->currency_name}}
                                    @endif</td>
                                <td>{{$row->grar_price}}</td>
                                <td>@if($row->grar)
                                    {{$row->grar->currency_name}}
                                    @endif</td>
                                <td>{{$row->hrf_price}}</td>
                                <td>@if($row->hrf)
                                    {{$row->hrf->currency_name}}
                                    @endif</td>
                                <td>  <?php $date = date_create($row->validity_date) ?>
                                {{ date_format($date,'Y-m-d') }}</td>

                                <td>
                                    <a href="{{ route('trucking-rate.edit',$row->id) }}" class="btn btn-info d-inline-block">edit</a>
                                    <a href="#" onclick="destroy('this trucking-rate','{{$row->id}}')" class="btn d-inline-block btn-danger">delete</a>
                                    <form id="delete_{{$row->id}}" action="{{ route('trucking-rate.destroy', $row->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" value=""></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.row -->


</div>
@endsection

@section('modal')
<!-- Add new Modal -->
<div class="modal fade" id="addSubCat" tabindex="-1" role="dialog" aria-labelledby="addSubCat">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">X

            </button>
            <h3>Add Trucking Rates</h3>
            <div class="modal-body">
                <div class="ms-auth-container row no-gutters">
                    <div class="col-12 p-3">
                        <form action="{{route('trucking-rate.store')}}" method="POST">
                            {{ csrf_field() }}
                            <div class="ms-auth-container row">
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label class="exampleInputPassword1" for="exampleCheck1">Trucking Company</label>
                                        <input type="text" name="trucking_company" class="form-control" placeholder="Trucking Company">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3"></div>
                                <div class="col-md-6 mb-3">
                                    <div class="ui-widget form-group">
                                        <label>Pol</label>
                                        <select name="pol_id" class=" form-control" data-live-search="true">
                                        <option value="">Select ...</option>
                                            @foreach ($pols as $type)
                                            <option value='{{$type->id}}'>
                                                {{ $type->port_type}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="ui-widget form-group">
                                        <label>Pod</label>
                                        <select name="pod_id" class=" form-control" data-live-search="true">
                                        <option value="">Select ...</option>
                                            @foreach ($pods as $type)
                                            <option value='{{$type->id}}'>
                                                {{ $type->port_type}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label class="exampleInputPassword1" for="exampleCheck1">*Faradany Price</label>
                                        <input type="number" name="faradany_price" class="form-control" placeholder="Faradany Price">
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="ui-widget form-group">
                                        <label>Faradany Currency</label>
                                        <select name="faradany_currency_id" class="form-control" data-live-search="true">
                                        <option value="">Select ...</option>
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
                                        <input type="number" name="trailer_price" class="form-control" placeholder="Trailer Price">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="ui-widget form-group">
                                        <label>Trailer Currency</label>
                                        <select name="trailer_currency_id" class="form-control" data-live-search="true">
                                        <option value="">Select ...</option>
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
                                        <input type="number" name="grar_price" class="form-control" placeholder="Grar Price">
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="ui-widget form-group">
                                        <label>Grar Currency</label>
                                        <select name="grar_currency_id" class="form-control" data-live-search="true">
                                        <option value="">Select ...</option>
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
                                        <input type="number" name="hrf_price" class="form-control" placeholder="40 HRF Price">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="ui-widget form-group">
                                        <label>40 HRF Currency</label>
                                        <select name="hrf_currency_id" class="form-control" data-live-search="true">
                                        <option value="">Select ...</option>
                                            @foreach ($hrfs as $type)
                                            <option value='{{$type->id}}'>
                                                {{ $type->currency_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label class="exampleInputPassword1" for="exampleCheck1">Validitiy Date</label>
                                        <input type="date" class="form-control" name="validity_date" placeholder="Validitiy Date">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label class="exampleInputPassword1" for="exampleCheck1">Notes</label>
                                        <textarea id="newClint" class="form-control" name="notes" placeholder="Notes" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group d-flex justify-content-end text-center">
                                <input type="button" value="Cancel" class="btn btn-dark mx-2" data-dismiss="modal" aria-label="Close">
                                <input type="submit" value="Add" class="btn btn-success ">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- /Add new Modal -->

@endsection