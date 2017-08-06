<!DOCTYPE html>
<html>
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Test Jquery</title>

	<link rel="stylesheet" href="{{ URL::asset('/robust-assets/css/app.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/datatable/dataTables.bootstrap4.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/extensions/responsive.dataTables.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/extensions/fixedColumns.dataTables.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/extensions/buttons.dataTables.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/datatable/buttons.bootstrap4.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/tables/extensions/colReorder.dataTables.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/sweetalert.css') }}" />
	<link rel="stylesheet" href="{{ URL::asset('/robust-assets/css/vendors.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/robust-assets/css/plugins/sliders/slick/slick.css') }}" />


	<script src="{{ URL::asset('/js/jquery-3.1.1.min.js') }}" type="text/javascript"></script>
	<script src="{{URL::asset('/robust-assets/js/components/tables/datatables/datatable-basic.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/js/sweetalert.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/forms/spinner/jquery.bootstrap-touchspin.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/forms/validation/jqBootstrapValidation.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/forms/icheck/icheck.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/forms/toggle/bootstrap-switch.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/forms/toggle/switchery.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/components/forms/validation/form-validation.js') }}" type="text/javascript"></script>

	<script src="{{ URL::asset('/robust-assets/js/vendors.min.js') }}"></script>
	
	<script src="{{ URL::asset('/robust-assets/js/plugins/tables/jquery.dataTables.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/plugins/tables/datatable/dataTables.bootstrap4.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/robust-assets/js/app.min.js') }}"></script>


</head>
<body>
	<div class="container">
	<div class="panel panel-default">
	<div class="panel-heading">
		Test Jquery
	</div>
	<div class="panel=body">
		{!!Form::open(['url'=>'postJquery','method'=>'POST','id'=>'frm-insert'])!!}

		<div class="row">

			<div class="col-md-3">
				<div class="form-group">
					{!!Form::label('id','ID')!!}
					{!!Form::text('id', null, ['id'=>'id', 'class' => 'form-control'])!!}
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					{!!Form::label('facility','Facility')!!}
					{!!Form::text('facility', null, ['id'=>'facility', 'class' => 'form-control'])!!}
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					{!!Form::label('desc','Description')!!}
					{!!Form::text('desc', null, ['id'=>'desc', 'class' => 'form-control'])!!}
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					{!!Form::label('day','Day Price')!!}
					{!!Form::text('day', null, ['id'=>'day', 'class' => 'form-control'])!!}
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					{!!Form::label('night','Night Price')!!}
					{!!Form::text('night', null, ['id'=>'night', 'class' => 'form-control'])!!}
				</div>
			</div>
		</div>

		<div class='row'>
			<div class="col-md-4">
				<div class="form-group">
					{!!Form::select('role_id',$roles,null,['id'=>'role_id','class'=>'form-control'])!!}
				</div>
			</div>
			<div class="col-md-4">
				
					{!!Form::submit('Save',['class'=>'btn btn-primary'])!!}
				
			</div>
		</div>

		{!!Form::close()!!}
	</div>
	<div class="table-responsive">

	</div>
</div>
</div>
@include('jquery.update')
<script type="text/javascript">
	$(document).ready(function(){

		$.ajaxSetup({
		        headers: {
		            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		        }
			});
	});

	$('#frm-insert').on('submit',function(e){
		e.preventDefault();
		
		var url = $(this).attr('action');
		var post = $(this).attr('method');
		var data = $(this).serializeArray();

		$.ajax({
			type : post,
			url : url,
			data : data,
			success:function(data)
			{
				
				readByAjax();
			}
		})
	})
	//---------------------EDIT BUTTON--------------------------------

	$(document).on('click','.edit',function(e){
		var id = $(this).val();
		$.ajax({
			type : 'get',
			url : "{{ url('getEditAjax') }}",
			data : {id:id},
			success:function(data)
			{
				//console.log(data);
				if(data.status==1)
					{
						$("#active").attr('checked', 'checked');
					}
				else
					{
						$("#inactive").attr('checked', 'checked');
					}
				var frmupdate = $('#frm-update');

				frmupdate.find('#facility').val(data.facilityName);
				frmupdate.find('#desc').val(data.facilityDesc);
				frmupdate.find('#day').val(data.facilityDayPrice);
				frmupdate.find('#night').val(data.facilityNightPrice);
				frmupdate.find('#id').val(data.facilityID);
				frmupdate.find('#role_id').val(data.facilityTypeID);
				frmupdate.find('#primeID').val(data.primeID);
				
				
				
				$('#modalEdit').modal('show');
			}
		})
	})

	$('#frm-update').on('submit',function(e){
		e.preventDefault();
		var data = $(this).serialize();
		var url = $(this).attr('action');
		var post = $(this).attr('method');
		$.post(url,data,function(data){
			
			$('#frm-update').trigger('reset');
			$('#popup-update').hide();
			readByAjax();

		})
	})

	//-----------------------------------------------------

	readByAjax();

	//-----------------------------------------------------
	function readByAjax()
	{
		$.ajax({
			type : 'get',
			url : "{{ url('readByAjax') }}",
			dataType : 'html',
			success:function(data)
			{
				$('.table-responsive').html(data);
			}
		})
	}

</script>

</body>
</html>