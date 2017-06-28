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
	Case
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
		<h2 class="content-header-titlemb-0">Case </h2>
		<p class="text-muted mb-0">All transactions regarding resident</p>
	</div>
@endsection

@section('breadcrumb')
	<ol class="breadcrumb">
		<li class="breadcrumb-item">Transaction</li>
		<li class="breadcrumb-item"><a href="/case">Case</a></li>
		<li class="breadcrumb-item"><a href="#">File Case</a></li>
	</ol>
@endsection

@section('content-body')
	<div class="row">
		<div class="col-xs-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">File New Case</h4>
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
						<form action="#" class="number-tab-steps wizard-notification">
							<h6>Case Info</h6>
							<fieldset>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="firstName1">Case Name :</label>
											<input type="text" class="form-control" id="firstName1" />
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label for="firstName1">Case Description :</label>
											<input type="textarea" class="form-control" id="firstName1" />
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="emailAddress1">Case Type : </label>
											<select class="form-control">
												<option>Blotter</option>
												<option>Formal</option>
											</select>
										</div>
									</div>
								</div>
							</fieldset>

							<h6>Defendant Info</h6>
							<fieldset>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="firstName1">First Name :</label>
											<input type="text" class="form-control" id="firstName1" />
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label for="firstName1">Middle Name :</label>
											<input type="text" class="form-control" id="firstName1" />
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label for="firstName1">Last Name :</label>
											<input type="text" class="form-control" id="firstName1" />
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label for="firstName1">Suffix :</label>
											<input type="text" class="form-control" id="firstName1" />
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label for="address">Province : </label>
											<input type="text" class="form-control" id="firstName1" />
										</div>
									</div>
									
									<div class="col-md-6">
										<div class="form-group">
											<label for="address">Municipality : </label>
											<input type="text" class="form-control" id="firstName1" />
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label for="address">City : </label>
											<input type="text" class="form-control" id="firstName1" />
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label for="address">Barangay : </label>
											<input type="text" class="form-control" id="firstName1" />
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label for="address">Street : </label>
											<input type="text" class="form-control" id="firstName1" />
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label for="address">Lot : </label>
											<input type="text" class="form-control" id="firstName1" />
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label for="address">House : </label>
											<input type="text" class="form-control" id="firstName1" />
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label for="address">Unit : </label>
											<input type="text" class="form-control" id="firstName1" />
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="emailAddress1">Gender : </label>
											<select class="form-control">
												<option>MALE</option>
												<option>FEMALE</option>
											</select>
										</div>
									</div>
								</div>
							</fieldset>

							<h6>Complainant Info</h6>
							<fieldset>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="firstName1">First Name :</label>
											<input type="text" class="form-control" id="firstName1" />
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label for="firstName1">Middle Name :</label>
											<input type="text" class="form-control" id="firstName1" />
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label for="firstName1">Last Name :</label>
											<input type="text" class="form-control" id="firstName1" />
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label for="firstName1">Suffix :</label>
											<input type="text" class="form-control" id="firstName1" />
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label for="address">Province : </label>
											<input type="text" class="form-control" id="firstName1" />
										</div>
									</div>
									
									<div class="col-md-6">
										<div class="form-group">
											<label for="address">Municipality : </label>
											<input type="text" class="form-control" id="firstName1" />
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label for="address">City : </label>
											<input type="text" class="form-control" id="firstName1" />
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label for="address">Barangay : </label>
											<input type="text" class="form-control" id="firstName1" />
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label for="address">Street : </label>
											<input type="text" class="form-control" id="firstName1" />
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label for="address">Lot : </label>
											<input type="text" class="form-control" id="firstName1" />
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label for="address">House : </label>
											<input type="text" class="form-control" id="firstName1" />
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label for="address">Unit : </label>
											<input type="text" class="form-control" id="firstName1" />
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="emailAddress1">Gender : </label>
											<select class="form-control">
												<option>MALE</option>
												<option>FEMALE</option>
											</select>
										</div>
									</div>
								</div>
							</fieldset>

							<h6>Summary</h6>
							<fieldset>
								
							</fieldset>
						</form>
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
