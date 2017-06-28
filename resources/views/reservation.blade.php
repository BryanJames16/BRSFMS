@extends('master.master')

@section('vendor-plugin')
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/datatable/dataTables.bootstrap4.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/extensions/responsive.dataTables.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/extensions/fixedColumns.dataTables.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/extensions/buttons.dataTables.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/datatable/buttons.bootstrap4.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/extensions/colReorder.dataTables.min.css') }}" />
@endsection

<!-- Title of the Page -->
@section('title')
	Facility Reservation
@endsection

<!-- Set All JavaScript Settings -->
@section('js-setting')

	<!-- Set the Selected Tab in Navbar -->
	<script type="text/javascript">
		setSelectedTab(FILECASE);
	</script>
@endsection

@section('content-header')
	<div class="content-header-left col-md-6 col-xs-12">
		<h2 class="content-header-titlemb-0">Reservation </h2>
		<p class="text-muted mb-0">All transactions regarding reservation</p>
	</div>
@endsection

@section('breadcrumb')
	<ol class="breadcrumb">
		<li class="breadcrumb-item">Transaction</li>
		<li class="breadcrumb-item"><a href="/facility-reservation">Facility</a></li>
		<li class="breadcrumb-item"><a href="#">Reservation</a></li>
	</ol>
@endsection

@section('content-body')
	<div class="row">
		<div class="col-xs-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Reserve Facility</h4>
					<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
					<div class="heading-elements">
						<ul class="list-inline mb-0">
							<li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
							<li><a data-action="reload"><i class="icon-reload"></i></a></li>
							<li><a data-action="expand"><i class="icon-expand2"></i></a></li>
							<li><a data-action="close"><i class="icon-cross2"></i></a></li>
						</ul>
					</div>
				</div>

				<div class="card-body collapse in">
					<div class="card-block">
						{!!Form::open(['url'=>'/reservation/store', 'method' => 'POST'])!!}
							
							<fieldset>
								<div class="row">

									<div class="col-md-6">
										<div class="form-group">
											<label for="firstName1">Reservation Name :</label>
											{!!Form::text('name',null,['id'=>'name','class'=>'form-control', 'placeholder'=>'eg.Birthday Party', 'maxlength'=>'30','required','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 30 characters', 'minlength'=>'5'])!!}
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label for="firstName1">Reservee :</label>
											{{ Form::select('peoplePrimeID', $people, null, ['id'=>'peoplePrimeID', 'class' => 'form-control border-info selectBox']) }}
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label for="firstName1">Facility :</label>
											{{ Form::select('facilityPrimeID', $facilities, null, ['id'=>'facilityPrimeID', 'class' => 'form-control border-info selectBox']) }}
										</div>
									</div>
								</div>

								<div class="row">
									

									<div class="col-md-6">
										<div class="form-group">
											<label for="firstName1">Reservation Description :</label>
											{!!Form::textarea('desc',null,['id'=>'desc','class'=>'form-control', 'placeholder'=>'eg.Jun Jun 15th Birthday Party', 'maxlength'=>'500','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 500 characters'])!!}

										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label for="firstName1">Date :</label>
											<div class='input-group'>
													{!!Form::date('date',null,['id'=>'date','class'=>'form-control'])!!}	
											</div>
										</div>
									</div>

								</div>

								<div class="row">
									
									<div class="col-md-6">
										<div class="form-group">
											<label for="firstName1">Start Time :</label>
													{!!Form::time('startTime',null,['id'=>'startTime','class'=>'form-control'])!!}
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label for="firstName1">End Time :</label>
													{!!Form::time('endTime',null,['id'=>'endTime','class'=>'form-control'])!!}
										</div>
									</div>
								</div>
							</fieldset>
							{!!Form::submit('Submit',['class'=>'btn btn-success'])!!}
							
						{!!Form::close()!!}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('page-vendor-js')
	<script src="{{ URL::asset('/robust-assets/js/plugins/extensions/jquery.steps.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/pickers/dateTime/moment-with-locales.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/pickers/daterange/daterangepicker.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/forms/validation/jquery.validate.min.js') }}" type="text/javascript"></script>
@endsection

@section('page-level-js')
	<script src="{{ URL::asset('/robust-assets/js/components/forms/wizard-steps.js') }}" type="text/javascript"></script>
@endsection
