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
	Resident
@endsection

<!-- Set All JavaScript Settings -->
@section('js-setting')

	<!-- Set the Selected Tab in Navbar -->
	<script type="text/javascript">
		setSelectedTab(RESIDENT_APPLICATION);
	</script>
@endsection

@section('content-header')
	<div class="content-header-left col-md-6 col-xs-12">
		<h2 class="content-header-titlemb-0">Resident </h2>
		<p class="text-muted mb-0">All transactions regarding resident</p>
	</div>
@endsection

@section('breadcrumb')
	<ol class="breadcrumb">
		<li class="breadcrumb-item">Transaction</li>
		<li class="breadcrumb-item"><a href="#">Resident</a></li>
	</ol>
@endsection

@section('content-body')
	<section id="multi-column">
		<div class="row">
			<div class="col-xs-14">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Current Resident</h4>
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
								<button type="button" class="btn btn-outline-info btn-lg" data-toggle="modal" data-target="#iconModal" style="width:130px; font-size:13px" onclick="location.href='/resident-registration';">
									<i class="icon-edit2"></i> REGISTER<br>RESIDENT  
								</button>
							</p>
						</div>
					</div>

					<table class="table table-striped table-bordered datacol-column-filtering" id="table-container">
                    	<thead>
                    		<tr>
								<th>Resident ID</th>
								<th>Resident Name</th>
								<th>Contact #</th>
								<th>Gender</th>
								<th>Civil Status</th>
								<th>Resident Type</th>
								<th>Actions</th>
							</tr>
                    	</thead>

	                	<tbody>
	                		<tr>
	                			<td>001</td>
	                			<td>Calipay, Rowel Tenacio</td>
	                			<td>09235618634</td>
	                			<td>MALE</td>
	                			<td>Married</td>
	                			<td>Permanent Resident</td>
	                			<td>
	                				<button class='btn btn-icon btn-round btn-success normal'  type='button'>Edit</button>
             						<button class='btn btn-icon btn-round btn-info normal'  type='button'>Add family</button>
	                			</td>
	                		</tr>

	                		<tr>
	                			<td>002</td>
	                			<td>Renato, Jenny Tagum</td>
	                			<td>09134426789</td>
	                			<td>FEMALE</td>
	                			<td>Single</td>
	                			<td>Transient Resident</td>
	                			<td>
	                				<button class='btn btn-icon btn-round btn-success normal'  type='button'></i>Edit</button>
             						<button class='btn btn-icon btn-round btn-info normal'  type='button'>Add family</button>
	                			</td>
	                		</tr>
	                	</tbody>
	                </table>
				</div>

				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Current Family</h4>
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
						</div>
					</div>

					<table class="table table-striped table-bordered datacol-column-filtering" id="table-container">
                    	<thead>
                    		<tr>
								<tg>Family ID</th>
								<th>Family Name</th>
								<th>Members</th>
								<th>Head</th>
								<th>Actions</th>
							</tr>
                    	</thead>

	                	<tbody>
	                		<tr>
	                			<td>FAM-03</td>
	                			<td>Calipay</td>
	                			<td>5</td>
	                			<td>Calipay, Rowel Tenacio</td>
	                			<td>
	                				<button class='btn btn-icon btn-round btn-success normal'  type='button'></i>Edit</button>
	                				<button class='btn btn-icon btn-round btn-danger normal'  type='button'>Delete</button>
	                			</td>
	                		</tr>

	                		<tr>
	                			<td>FAM-06</td>
	                			<td>Renato</td>
	                			<td>15</td>
	                			<td>Renato, Jenny Tagum</td>
	                			<td>
	                				<button class='btn btn-icon btn-round btn-success normal'  type='button'></i>Edit</button>
	                				<button class='btn btn-icon btn-round btn-danger normal'  type='button'>Delete</button>
	                			</td>
	                		</tr>
	                	</tbody>
	                </table>
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

