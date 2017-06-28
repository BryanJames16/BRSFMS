@extends('master.base_maintenance')

<!-- Title of the Page -->
@section('title')
	Facility
@endsection

<!-- Set All JavaScript Settings -->
@section('js-setting')

	<!-- Set the Selected Tab in Navbar -->
	<script type="text/javascript">
		setSelectedTab(FACILITY_TYPE);
	</script>
@endsection


<!-- Adds the Content to the Main Page -->
@section('inside-content-header')
	<h2 class="content-header-title">Facility Type</h2>
@endsection

@section('inside-breadcrumb')
	<li class="breadcrumb-item">Facility</li>
	<li class="breadcrumb-item"><a href="#">Facility Type</a></li>


@endsection

@section('main-card-title')
	Facility Type
@endsection

@section('modal-card-title')
	Add Facility Type
@endsection

@section('modal-card-desc')
	Name of the Facility Type.
@endsection


@section('table')
<div class="table-responsive">

</div>

<script type="text/javascript">
	
	$(document).ready(function(){

		$.ajaxSetup({
		        headers: {
		            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		        }
			});
	});

	//---------------------Add--------------------

	$('#frm-insert').on('submit',function(e){
		e.preventDefault();
		
		var url = $(this).attr('action');
		var post = $(this).attr('method');
		var data = $(this).serialize();

		$.ajax({
			type : post,
			url : url,
			data : data,
			success:function(data)
			{
				readByAjax();	
			},
			error:function(data)
			{
				console.log(typeof(data));
			}
		})
	})

	//-----------------------------------------------------
	readByAjax();

	//----------------------Table-------------------------
	function readByAjax()
	{

		$.ajax({
			type : 'get',
			url : "{{ url('facilitytyperead') }}",
			dataType : 'html',
			success:function(data)
			{

				$('.table-responsive').html(data);
			}
		})
	}
</script>
@endsection

@section('modal-form-body')
	{!!Form::open(['url'=>'postfacilitytype', 'method' => 'POST', 'id' => 'frm-insert'])!!}

		{{ csrf_field() }}
	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*Name</label>
		<div class="col-md-9">
			{!!Form::text('typeName',null,['id'=>'typeName','class'=>'form-control', 'placeholder'=>'eg.Covered Court', 'maxlength'=>'30','data-toggle'=>'tooltip','data-trigger'=>'focus','data-placement'=>'top','data-title'=>'Maximum of 30 characters', 'required', 'minlength'=>'5', 'pattern'=>'^[a-zA-Z0-9-_ \']+$'])!!}
		</div>	

	</div>

	<div class="form-group row last">
		<label class="col-md-3 label-control">*Status</label>
		<div class="col-md-9">
			<div class="input-group col-md-9">
				<label class="inline custom-control custom-radio">
					<input type="radio" value="active" name="stat" checked="" class="custom-control-input" >
					<span class="custom-control-indicator"></span>
					<span class="custom-control-description ml-0">Active</span>
				</label>
				<label class="inline custom-control custom-radio">
					<input type="radio" value="inactive" name="stat"  class="custom-control-input" >
					<span class="custom-control-indicator"></span>
					<span class="custom-control-description ml-0">Inactive</span>
				</label>
			</div>
		</div>
	</div>
@endsection

@section('modal-form-action')
<input type="submit" class="btn btn-success" value="Add" name="btnAdd">
<button type="button" data-dismiss="modal" class="btn btn-warning mr-1">Cancel
</button>

{!!Form::close()!!}

@endsection