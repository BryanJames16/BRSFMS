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
	Sponsors
@endsection

@section('js-setting')

	<!-- Set the Selected Tab in Navbar -->
	<script type="text/javascript">
		setSelectedTab(CASEFILE);
	</script>
@endsection

@section('content-header')
	<div class="content-header-left col-md-6 col-xs-12">
		<h2 class="content-header-titlemb-0">Service Sponsors</h2>
		<p class="text-muted mb-0">All transactions regarding service sponsorship</p>
	</div>
@endsection

@section('breadcrumb')
	<ol class="breadcrumb">
		<li class="breadcrumb-item">Transaction</li>
		<li class="breadcrumb-item"><a href="#">Service</a></li>
	</ol>
@endsection

@section('content-body')
	<section id="multi-column">
		<div class="row">
			<div class="col-xs-14">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Sponsors</h4>
						<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
						<div class="heading-elements">
							<ul class="list-inline mb-0">
								<li><a data-action="reload"><i class="icon-reload"></i></a></li>
								<li><a data-action="expand"><i class="icon-expand2"></i></a></li>
							</ul>
						</div>
					</div>

					<div class="card-body collapse in">
						<div class="card-block card-dashboard">
							<p align="right">
								<!-- Button trigger modal -->
								<button type="button" class="btn btn-outline-info btn-lg" data-toggle="modal" data-target="#iconModal" style="width:130px; font-size:13px" onclick="location.href='/service-sponsorship';">
									<i class="icon-edit2"></i> SPONSOR A<br>SERVICE  
								</button>
							</p>

							<table class="table table-striped table-bordered datacol-column-filtering" id="table-container">
                    	<thead>
                    		<tr>
								<td>Sponsor ID</td>
								<td>Sponsor Name</td>
								<td>Service Type</td>
								<td>Date</td>
								<td>Status</td>
								<td>Actions</td>
							</tr>
                    	</thead>

	                	<tbody>
	                		<tr>
	                			<td>SPN-EE7</td>
	                			<td>Lumawag, Joshua Ariago</td>
	                			<td>HEALTH</td>
	                			<td>March 8, 2017</td>
	                			<td>APPROVED</td>
	                			<td>
			                		<div class="btn-group" role="group" aria-label="Basic example">
			                			<button class='btn btn-info btn-icon btn-round view' data-toggle="tooltip" data-placement="top" data-original-title="View Details" type='button' name='btnView'><i class="icon-android-more-vertical"></i></button>
			                			<button class='btn btn-icon btn-round btn-success normal edit'  type='button' data-toggle="tooltip" data-placement="top" data-original-title="Edit Details"><i class="icon-android-create"></i></button>
			                		</div>
			                	</td>
	                		</tr>

	                		<tr>
	                			<td>SPN-022</td>
	                			<td>Carpa, Mae Jin</td>
	                			<td>FIRE DEPARTMENT</td>
	                			<td>February, 20, 2014</td>
	                			<td>PENDING</td>
	                			<td>
			                		<div class="btn-group" role="group" aria-label="Basic example">
			                			<button class='btn btn-info btn-icon btn-round view' data-toggle="tooltip" data-placement="top" data-original-title="View Details" type='button' name='btnView'><i class="icon-android-more-vertical"></i></button>
			                			<button class='btn btn-icon btn-round btn-success normal edit'  type='button' data-toggle="tooltip" data-placement="top" data-original-title="Edit Details"><i class="icon-android-create"></i></button>
			                		</div>
			                	</td>
	                		</tr>
	                	</tbody>
	                </table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection

@section('page-vendor-js')
	<script src="{{ URL::asset('/robust-assets/js/plugins/tables/datatable/dataTables.bootstrap4.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/tables/datatable/dataTables.fixedColumns.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/tables/datatable/dataTables.responsive.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/tables/datatable/dataTables.colReorder.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/tables/datatable/dataTables.buttons.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/tables/datatable/buttons.bootstrap4.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/tables/buttons.colVis.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/js/sweetalert.min.js') }}" type="text/javascript"></script>
@endsection

@section('page-level-js')
	<script src="{{ URL::asset('/robust-assets/js/components/tables/datatables-extensions/datatables-colreorder.js') }}" type="text/javascript"></script>
@endsection
