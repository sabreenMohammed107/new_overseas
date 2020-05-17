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
                <h6>Air Rates</h6>
                <a href="#" class="btn btn-dark" data-toggle="modal" data-target="#addSubCat"> add new </a>
            </div>
            <div class="ms-panel-body">
                <div class="table-responsive">
                    <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
                        <thead>
                            <th>#</th>
                            <th>Air Carrier</th>
                            <th>Aol</th>
                            <th>Aod</th>
                            <th>Slide Range</th>
                            <th>Price</th>
                            <th>Currency</th>
                            <th>Validity Date</th>

                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rows as $index => $row)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td> @if($row->carrier)
                                    {{$row->carrier->carrier_name}}
                                    @endif</td>
                                <td>@if($row->aol)
                                    {{$row->aol->port_type}}
                                    @endif</td>
                                <td> @if($row->aod)
                                    {{$row->aod->port_type}}
                                    @endif</td>
                                <td>{{$row->slide_range}}</td>
                                <td>{{$row->price}}</td>
                                <td>@if($row->currency)
                                    {{$row->currency->currency_name}}
                                    @endif</td>
                                <td>
                                <?php $date = date_create($row->validity_date) ?>
                                {{ date_format($date,'Y-m-d') }}
                                </td>

                                <td>
                                    <a href="{{ route('air-rate.edit',$row->id) }}" class="btn btn-info d-inline-block">edit</a>
                                    <a href="#" onclick="destroy('this air-rate','{{$row->id}}')" class="btn d-inline-block btn-danger">delete</a>
                                    <form id="delete_{{$row->id}}" action="{{ route('air-rate.destroy', $row->id) }}" method="POST" style="display: none;">
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
            <h3>Add Air Rates</h3>
            <div class="modal-body">
				<div class="ms-auth-container row no-gutters">
					<div class="col-12 p-3">
                    <form action="{{route('air-rate.store')}}" method="POST" >
                            {{ csrf_field() }}
							<div class="ms-auth-container row">
								<div class="col-md-6 mb-3">
									<div class="ui-widget form-group">
										<label>Air Carrier</label>
                                        <select name="air_carrier_id" class=" form-control" data-live-search="true">
                                        <option value="">Select ...</option>
                                            @foreach ($carriers as $type)
                                            <option value='{{$type->id}}'>
                                                {{ $type->carrier_name}}</option>
                                            @endforeach
                                        </select>
									</div>
								</div>
								<div class="col-md-6 mb-3">
									<div class="ui-widget form-group">
										<label>Currency</label>
										<select name="currency_id" class="form-control" data-live-search="true">
                                        <option value="">Select ...</option>
                                            @foreach ($currencies as $type)
                                            <option value='{{$type->id}}'>
                                                {{ $type->currency_name}}</option>
                                            @endforeach
                                        </select>
									</div>
								</div>
								<div class="col-md-6 mb-3">
									<div class="ui-widget form-group">
										<label>Aol</label>
										<select name="aol_id" class=" form-control" data-live-search="true">
                                        <option value="">Select ...</option>
                                            @foreach ($aols as $type)
                                            <option value='{{$type->id}}'>
                                                {{ $type->port_type}}</option>
                                            @endforeach
                                        </select>
									</div>
								</div>
								<div class="col-md-6 mb-3">
									<div class="ui-widget form-group">
										<label>Aod</label>
                                        <select name="aod_id" class=" form-control" data-live-search="true">
                                        <option value="">Select ...</option>
                                            @foreach ($aods as $type)
                                            <option value='{{$type->id}}'>
                                                {{ $type->port_type}}</option>
                                            @endforeach
                                        </select>
									</div>
								</div>
								<div class="col-md-6 mb-3">
									<div class="form-group">
										<label class="exampleInputPassword1" for="exampleCheck1">*Slide Range</label>
										<input type="text" name="slide_range" class="form-control" placeholder="Slide Range">
									</div>
								</div>
								<div class="col-md-6 mb-3">
									<div class="form-group">
										<label class="exampleInputPassword1" for="exampleCheck1">*Price</label>
										<input type="number" name="price" class="form-control" placeholder="Price">
									</div>
								</div>
								<div class="col-md-6 mb-3">
									<div class="form-group">
										<label class="exampleInputPassword1" for="exampleCheck1">Validitiy Date</label>
										<input type="date" name="validity_date" class="form-control" placeholder="Validitiy Date">
									</div>
								</div>
								<div class="col-md-6 mb-3">
									<div class="form-group">
										<label class="exampleInputPassword1" for="exampleCheck1">Notes</label>
										<textarea id="newClint" class="form-control"
											name="notes"	  placeholder="Notes" rows="3"></textarea>
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