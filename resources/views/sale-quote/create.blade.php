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
				<form action="{{ route('sale-quote.store') }}" method="post">
					@csrf
					<div class="row">

						<div class="col-md-4 mb-3">
							<div class="ui-widget form-group">
								<label>Client</label>
								<select name="client_id" class=" form-control" data-live-search="true">
									<option value="">Select ...</option>
									@foreach ($clients as $type)
									<option value='{{$type->id}}'>
										{{ $type->client_name}}</option>
									@endforeach
								</select>
							</div>
						</div>

						<div class="col-md-4 mb-3">
							<div class="form-group">
								<label class="exampleInputPassword1" for="exampleCheck1">Quote Date</label>
								<input type="date" class="form-control" name="quote_date" placeholder="Quote Date">
							</div>
						</div>
					</div>
					<div style="margin-bottom:25px">
						<div style="border-bottom:solid 2px #0094ff;width:160px">
							<input type="radio" name="tab" value="igotnone" onclick="show1();" checked /> Air
							<input type="radio" name="tab" value="igottwo" onclick="show2();" clicked="clicked" /> Ocean
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
										<div class="form-group">
											<label class="exampleInputPassword1" for="exampleCheck1">Code</label>
											<input type="text" id="code" name="code" onblur="air()" class="airCarriers form-control" placeholder="Air Code">
										</div>
									</div>
									<!-- <div class="col-md-6 mb-3">
										<div class="ui-widget form-group">
											<label>Air Carrier</label>
											<select name="air_rate_id" class="airCarrier form-control" data-live-search="true">
												<option value="">Select ...</option>
												@foreach ($airs as $type)
												<option value='{{$type->id}}'>
												
													{{ $type->code}}
													
												</option>
												@endforeach
											</select>
										</div>
									</div> -->
									<!-- <div class="col-md-6 mb-3"></div> -->

									<div class="col-md-6 mb-3">
										<div class="form-group">
											<label class="exampleInputPassword1" for="exampleCheck1">Price</label>
											<input type="text" id="air_price" name="air_price" class="form-control" placeholder="Price">
										</div>
									</div>
									<div class="col-md-6 mb-3">
										<div class="ui-widget form-group">
											<label>Currency</label>
											<select id="air_currency_id" name="air_currency_id" class=" form-control" data-live-search="true" disabled>
												<option value="">Select ...</option>
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
											<label class="exampleInputPassword1" for="exampleCheck1">Carrier</label>
											<input type="text" id="air_rate_id" name="air_rate_id" class="form-control" placeholder="air Carrier" disabled>
										</div>
									</div>
									<div class="col-md-6 mb-3">
										<div class="form-group">
											<label class="exampleInputPassword1" for="exampleCheck1">Aol</label>
											<input type="text" id="air_aol_id" name="air_aol_id" class="form-control" placeholder="Aol" disabled>
										</div>
									</div>
									<div class="col-md-6 mb-3">
										<div class="form-group">
											<label class="exampleInputPassword1" for="exampleCheck1">Aod</label>
											<input type="text" id="air_aod_id" name="air_aod_id" class="form-control" placeholder="Aod" disabled>
										</div>
									</div>
									<div class="col-md-6 mb-3">
										<div class="form-group">
											<label class="exampleInputPassword1" for="exampleCheck1">Slide Range</label>
											<input type="text" id="air_slide_range" name="air_slide_range" class="form-control" placeholder="Slide Range" disabled>
										</div>
									</div>
									<div class="col-md-6 mb-3">
										<div class="form-group">
											<label class="exampleInputPassword1" for="exampleCheck1">Validitiy Date</label>
											<input type="date" id="air_validity_date" name="air_validity_date" class="form-control" placeholder="Validitiy Date" disabled>
										</div>
									</div>
									<div class="col-md-6 mb-3">
										<div class="form-group">
											<label class="exampleInputPassword1" for="exampleCheck1">Notes</label>
											<textarea id="air_notes" name="air_notes" class="form-control" placeholder="Notes" rows="3" disabled></textarea>
										</div>
									</div>
								</div>
							</div>
							<div id="div1" class="hide">
								<div class="ms-auth-container row">
									<div class="col-md-6 mb-3">
										<div class="form-group">
											<label class="exampleInputPassword1" for="exampleCheck1">Code</label>
											<input type="text" id="codeOcean" name="codeOcean" onblur="codeocean()" class="form-control" placeholder="Ocean Code">
										</div>
									</div>
									<!-- <div class="col-md-6 mb-3">
										<div class="ui-widget form-group">
											<label>Ocean Freigt Carrier</label>
											<select name="ocean_rate_id" class="oceanCarrier form-control" data-live-search="true">
												<option value="">Select ...</option>
												@foreach ($oceans as $type)
												<option value='{{$type->id}}'>
												
													{{ $type->code}}
												</option>
												@endforeach
											</select>
										</div>
									</div> -->


									<div class="col-md-6 mb-3">
										<div class="form-group">
											<label class="exampleInputPassword1" for="exampleCheck1">Price</label>
											<input type="number" id="ocean_price" name="ocean_price" class="form-control" placeholder="Price">
										</div>
									</div>
									<div class="col-md-6 mb-3">
										<div class="ui-widget form-group">
											<label>Currency</label>
											<select id="ocean_currency_id" name="ocean_currency_id" class=" form-control" data-live-search="true" disabled>
												<option value="">Select ...</option>
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
											<label class="exampleInputPassword1" for="exampleCheck1">Carrier</label>
											<input type="text" id="ocean_rate_id" name="ocean_rate_id" class="form-control" placeholder="air Carrier" disabled>
										</div>
									</div>
									<div class="col-md-6 mb-3">
										<div class="form-group">
											<label class="exampleInputPassword1" for="exampleCheck1">Pol</label>
											<input type="text" name="ocean_pol_id" id="ocean_pol_id" class="form-control" placeholder="Pol" disabled>
										</div>
									</div>
									<div class="col-md-6 mb-3">
										<div class="form-group">
											<label class="exampleInputPassword1" for="exampleCheck1">Pod</label>
											<input type="text" name="ocean_pod_id" id="ocean_pod_id" class="form-control" placeholder="Pod" disabled>
										</div>
									</div>
									<div class="col-md-6 mb-3">
										<div class="form-group">
											<label class="exampleInputPassword1" for="exampleCheck1">Container</label>
											<input type="text" name="ocean_container_id" id="ocean_container_id" class="form-control" placeholder="Container" disabled>
										</div>
									</div>
									<div class="col-md-6 mb-3">
										<div class="form-group">
											<label class="exampleInputPassword1" for="exampleCheck1">Transit Time</label>
											<input type="number" name="ocean_transit_time" id="ocean_transit_time" class="form-control" placeholder="Transit Time" disabled>
										</div>
									</div>
									<div class="col-md-6 mb-3">
										<div class="form-group">
											<label class="exampleInputPassword1" for="exampleCheck1">Validitiy Date</label>
											<input type="date" name="ocean_validity_date" id="ocean_validity_date" class="form-control" placeholder="Validitiy Date" disabled>
										</div>
									</div>
									<div class="col-md-6 mb-3">
										<div class="form-group">
											<label class="exampleInputPassword1" for="exampleCheck1">Notes</label>
											<textarea name="ocean_notes" id="ocean_notes" class="form-control" placeholder="Notes" rows="3" disabled></textarea>
										</div>
									</div>
								</div>
							</div>
							<div>
								<div style="border-bottom:solid 2px #0094ff;margin-bottom:20px"></div>
								<div class="ms-auth-container row">
									<div class="col-md-6 mb-3">
										<div class="form-group">
											<label class="exampleInputPassword1" for="exampleCheck1">Code</label>
											<input type="text" id="codetracking" name="codetracking" onblur="codetrack()" class="form-control" placeholder="tracking Code">
										</div>
									</div>
									<!-- <div class="col-md-6 mb-3">
										<div class="ui-widget form-group">
											<label>Trucking Rate</label>
											<select name="trucking_rate_id" class="truckingCarrier form-control" data-live-search="true">
												<option value="">Select ...</option>
												@foreach ($truckings as $type)
												<option value='{{$type->id}}'>
													 @if($type->supplier) 
													{{ $type->code}}
												 @endif 
												</option>
												@endforeach
											</select>
										</div>
									</div> -->
									<div class="col-md-6 mb-3"></div>
									<!-- <div class="col-md-6 mb-3">
										<div class="form-group">
											<label class="exampleInputPassword1" for="exampleCheck1">Trucking Company</label>
											<input type="text" class="form-control" placeholder="Trucking Company" disabled>
										</div>
									</div> -->
									<div class="col-md-6 mb-3">
										<div class="form-group">
											<label class="exampleInputPassword1" for="exampleCheck1">Validitiy Date</label>
											<input type="date" id="trucking_validity_date" name="trucking_validity_date" class="form-control" placeholder="Validitiy Date" disabled>
										</div>
									</div>
									<div class="col-md-6 mb-3">
										<div class="form-group">
											<label class="exampleInputPassword1" for="exampleCheck1">Pol</label>
											<input type="text" id="trucking_pol_id" name="trucking_pol_id" class="form-control" placeholder="Pol" disabled>
										</div>
									</div>
									<div class="col-md-6 mb-3">
										<div class="form-group">
											<label class="exampleInputPassword1" for="exampleCheck1">Pod</label>
											<input type="text" id="trucking_pod_id" name="trucking_pod_id" class="form-control" placeholder="Pod" disabled>
										</div>
									</div>
									<div class="col-md-6 mb-3">
										<div class="form-group">
											<label class="exampleInputPassword1" for="exampleCheck1">Notes</label>
											<textarea id="trucking_notes" name="trucking_notes" class="form-control" placeholder="Notes" disabled rows="3"></textarea>
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
											<select name="faradany_currency_id" class=" form-control" data-live-search="true">
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
											<select name="trailer_currency_id" class=" form-control" data-live-search="true">
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
											<select name="grar_currency_id" class=" form-control" data-live-search="true">
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
											<label class="exampleInputPassword1" for="exampleCheck1">*HRF Price</label>
											<input type="number" name="hrf_price" class="form-control" placeholder="HRF Price">
										</div>
									</div>
									<div class="col-md-6 mb-3">
										<div class="ui-widget form-group">
											<label>HRF Currency</label>
											<select name="hrf_currency_id" class="form-control" data-live-search="true">
												<option value="">Select ...</option>
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
											<input type="number" name="clearance_price" class="form-control" placeholder="Clearance Price">
										</div>
									</div>
									<div class="col-md-6 mb-3">
										<div class="ui-widget form-group">
											<label>Clearance Currency</label>
											<select name="clearance_currency_id" class="form-control" data-live-search="true">
												<option value="">Select ...</option>
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
											<textarea name="clearance_notes" class="form-control" placeholder="Notes" rows="3"></textarea>
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
											<input type="number" name="door_door_price" class="form-control" placeholder="Door to Door Price">
										</div>
									</div>
									<div class="col-md-6 mb-3">
										<div class="ui-widget form-group">
											<label>Door Currency</label>
											<select name="door_door_currency_id" class="form-control" data-live-search="true">
												<option value="">Select ...</option>
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
											<textarea name="door_door_notes" class="form-control" placeholder="Notes" rows="3"></textarea>
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


	function air() {
		var value = document.getElementById('code').value;

		$.ajax({
			url: "{{route('fetchAir')}}",
			method: "get",
			data: {

				value: value
			},
			success: function(result) {
			
				$('#air_aol_id').val(result[0]);
				$('#air_aod_id').val(result[1]);
				$('#air_slide_range').val(result[2]);
				$('#air_validity_date').val(result[3]);
				$('#air_notes').html(result[4]);
				$('#air_rate_id').val(result[5]);
				$('#air_price').val(result[6]);
				$output = '<option value="">' + result[7] + '</option>';
				$('#air_currency_id').html($output);

			}

		})
	}
</script>
<!--/radio button-->


<script>
	$(document).ready(function() {





		//trucking
		// $('.truckingCarrier').change(function() {

		// 	if ($(this).val() != '') {
		// 		var select = $(this).attr("id");
		// 		var value = $(this).val();



		// 		$.ajax({
		// 			url: "{{route('fetchTrucking')}}",
		// 			method: "get",
		// 			data: {
		// 				select: select,
		// 				value: value
		// 			},
		// 			success: function(result) {

		// 				$('#trucking_pol_id').val(result[0]);
		// 				$('#trucking_pod_id').val(result[1]);
		// 				$('#trucking_validity_date').val(result[2]);
		// 				$('#trucking_notes').html(result[3]);


		// 			}

		// 		})
		// 	}
		// });




	});

	function codetrack() {
		var value = document.getElementById('codetracking').value;
	
	
		$.ajax({
			url: "{{route('fetchTrucking')}}",
			method: "get",
			data: {

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

	function codeocean() {


		var value = document.getElementById('codeOcean').value;
	
		$.ajax({
			url: "{{route('fetchOcean')}}",
			method: "get",
			data: {

				value: value
			},
			success: function(result) {
				alert(result[7]);
				$('#ocean_pol_id').val(result[0]);
				$('#ocean_pod_id').val(result[1]);
				$('#ocean_container_id').val(result[2]);
				$('#ocean_validity_date').val(result[3]);
				$('#ocean_notes').html(result[4]);
				$('#ocean_transit_time').val(result[5]);
				$('#ocean_rate_id').val(result[6]);
				$('#ocean_price').val(result[7]);
				$output = '<option value="">' + result[8] + '</option>';
				$('#ocean_currency_id').html($output);

			}

		})

	}
</script>
@endsection