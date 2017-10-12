<!-- Parent Template -->
@extends('master.base_maintenance')

<!-- Title of the Page -->
@section('title')
	Item
@endsection

<!-- Set All JavaScript Settings -->
@section('js-setting')

	<!-- Set the Selected Tab in Navbar -->
	<script type="text/javascript">
		setSelectedTab(ITEM);
	</script>
@endsection

<!-- Adds the Content to the Main Page -->
@section('inside-content-header')
	<h2 class="content-header-title">Item</h2>
@endsection
	
@section('inside-breadcrumb')
	<li class="breadcrumb-item">Facility</li>
	<li class="breadcrumb-item"><a href="#">Item</a></li>
@endsection

@section('main-card-title')
	Item
@endsection

@section('modal-card-title')
	Add Item
@endsection

@section('modal-card-desc')
	Items
@endsection

@section('modal-form-body')

	@if (count($errors) > 0)
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>

	    <script type="text/javascript">
	    	$(document).ready(function () {
		        $('#iconModal').modal('show');
		    });
	    </script>
	@endif
		

	{{Form::open(['url'=>'/item/store', 'method' => 'POST', 'id' => 'frm-add'])}}
	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*Name</label>
		<div class="col-md-9">
			{{ Form::text('itemName', null, ['id' => 'aItemName', 
                                            'class' => 'form-control', 
                                            'placeholder' => 'Tupperware Chairs', 
                                            'maxlength' => '30', 
                                            'data-toggle' => 'tooltip', 
                                            'data-trigger' => 'focus', 
                                            'data-placement' => 'top', 
                                            'data-title' => 'Maximum of 30 characters', 
                                            'required', 
                                            'minlength' => '5', 
                                            'pattern' => '^[a-zA-Z0-9-_ \']+$']) }}
		</div>	
	</div>

    <div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*Quantity</label>
		<div class="col-md-9">
			{{ Form::number('quantity', null, ['id' => 'aQuantity', 
                                            'class' => 'form-control', 
                                            'placeholder' => '90', 
                                            'maxlength' => '8', 
                                            'data-toggle' => 'tooltip', 
                                            'data-trigger' => 'focus', 
                                            'data-placement' => 'top', 
                                            'data-title' => 'Maximum of 8 digits', 
                                            'required', 
                                            'min' => '1', 
                                            'pattern' => '^[0-9]+$']) }}
		</div>	
	</div>

    <div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*Price</label>
		<div class="col-md-7">
			{{ Form::number('price', null, ['id' => 'aPrice', 
                                            'class' => 'form-control', 
                                            'placeholder' => '100', 
                                            'maxlength' => '30', 
                                            'data-toggle' => 'tooltip', 
                                            'data-trigger' => 'focus', 
                                            'data-placement' => 'top', 
                                            'data-title' => 'Maximum of 8 digits', 
                                            'required', 
                                            'min' => '1', 
                                            'step' => '0.25', 
                                            'pattern' => '^[0-9.]+$']) }}
		</div>	
        <div class="col-md-2">
            per unit
        </div>
	</div>

    <div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">Description</label>
		<div class="col-md-9">
			{{ Form::textarea('desccription', null, ['id' => 'aDescription', 
                                            'class' => 'form-control', 
                                            'placeholder' => 'Untouched monoblock chairs', 
                                            'maxlength' => '250', 
                                            'data-toggle' => 'tooltip', 
                                            'data-trigger' => 'focus', 
                                            'data-placement' => 'top', 
                                            'data-title' => 'Maximum of 250 characters', 
                                            'required',
                                            'pattern' => '^[a-zA-Z0-9-_ \']+$']) }}
		</div>	
	</div>

	<div class="form-group row last">
		<label class="col-md-3 label-control">*Status</label>
		<div class="col-md-9">
			<div class="input-group col-md-9">
				<label class="inline custom-control custom-radio">
					<input type="radio" value="active" name="stat" class="aStatus custom-control-input" >
					<span class="custom-control-indicator"></span>
					<span class="custom-control-description ml-0">Active</span>
				</label>
				<label class="inline custom-control custom-radio">
					<input type="radio" value="inactive" name="stat"  class="aStatus custom-control-input" >
					<span class="custom-control-indicator"></span>
					<span class="custom-control-description ml-0">Inactive</span>
				</label>
			</div>
		</div>
	</div>

@endsection

@section('modal-form-action')
	<input type="submit" class="btn btn-success" value="Add" name="btnAdd">
	<button type="button" data-dismiss="modal" class="btn btn-warning mr-1">Cancel</button>

	{{ Form::close() }}
@endsection

@section('table-head-list')
	<th>Name</th>
    <th>Description</th>
    <th>Quantity</th>
    <th>Price</th>
	<th>Status</th>
	<th>Actions</th>
@endsection

@section('table-body-list')
	@foreach($listOfItems as $item)
        
		<tr>
			<td>{{ $item -> itemName }}</td>
            <td>{{ $item -> itemDescription }}</td>
			<td>{{ $item -> itemQuantity }}</td>
            <td>{{ $item -> itemPrice }}</td>
			@if ($item -> status == 1)
				<td><span class="tag round tag-default tag-success">Active</span></td>
			@else
				<td><span class="tag round tag-default tag-danger">Inactive</span></td>
			@endif
			
			<td>
				{{ Form::open(['url' => '/item/delete', 'method' => 'POST', 'id' => $item -> typeID ]) }}
					<input type='hidden' name='typeID' value='{{ $item -> itemID }}' />
					<input type='hidden' name='typeName' value='{{ $item -> itemName }}' />
					<input type='hidden' name='status' value='{{ $item -> itemQuantity }}' />
                    <input type='hidden' name='status' value='{{ $item -> itemPrice }}' />
                    <input type='hidden' name='status' value='{{ $item -> status }}' />
					<button class='btn btn-icon btn-square btn-success normal edit'  type='button' value='{{ $item -> itemID }}'><i class="icon-android-create"></i></button>
					<button class='btn btn-icon btn-square btn-danger delete' value='{{ $item -> typeID }}' type='button' name='btnEdit'><i class="icon-android-delete"></i></button>
				{{ Form::close() }}
			</td>

			<td>
			</td>
		</tr>
        
	@endforeach
@endsection

@section('edit-modal-title')
	Update Item Information
@endsection

@section('edit-modal-desc')
	Update existing item data
@endsection

@section('ajax-edit-form')
	{{ Form::open(['url' => '/item/update', 'method' => 'POST', 'id' => 'frm-update']) }}
@endsection

@section('edit-modal-body')
	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*Name</label>
		<div class="col-md-9">
			{{ Form::text('eitemName', null, ['id' => 'eItemName', 
                                            'class' => 'form-control', 
                                            'placeholder' => 'Tupperware Chairs', 
                                            'maxlength' => '30', 
                                            'data-toggle' => 'tooltip', 
                                            'data-trigger' => 'focus', 
                                            'data-placement' => 'top', 
                                            'data-title' => 'Maximum of 30 characters', 
                                            'required', 
                                            'minlength' => '5', 
                                            'pattern' => '^[a-zA-Z0-9-_ \']+$']) }}
		</div>	
	</div>

	<div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*Quantity</label>
		<div class="col-md-9">
			{{ Form::number('equantity', null, ['id' => 'eQuantity', 
                                            'class' => 'form-control', 
                                            'placeholder' => '90', 
                                            'maxlength' => '8', 
                                            'data-toggle' => 'tooltip', 
                                            'data-trigger' => 'focus', 
                                            'data-placement' => 'top', 
                                            'data-title' => 'Maximum of 8 digits', 
                                            'required', 
                                            'min' => '1', 
                                            'pattern' => '^[0-9]+$']) }}
		</div>	
	</div>

    <div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">*Price</label>
		<div class="col-md-7">
			{{ Form::number('price', null, ['id' => 'aPrice', 
                                            'class' => 'form-control', 
                                            'placeholder' => '100', 
                                            'maxlength' => '30', 
                                            'data-toggle' => 'tooltip', 
                                            'data-trigger' => 'focus', 
                                            'data-placement' => 'top', 
                                            'data-title' => 'Maximum of 8 digits', 
                                            'required', 
                                            'min' => '1', 
                                            'step' => '0.25', 
                                            'pattern' => '^[0-9.]+$']) }}
		</div>	
        <div class="col-md-2">
            per unit
        </div>
	</div>

    <div class="form-group row">
		<label class="col-md-3 label-control" for="eventRegInput1">Description</label>
		<div class="col-md-9">
			{{ Form::textarea('desccription', null, ['id' => 'aDescription', 
                                            'class' => 'form-control', 
                                            'placeholder' => 'Untouched monoblock chairs', 
                                            'maxlength' => '250', 
                                            'data-toggle' => 'tooltip', 
                                            'data-trigger' => 'focus', 
                                            'data-placement' => 'top', 
                                            'data-title' => 'Maximum of 250 characters', 
                                            'required',
                                            'pattern' => '^[a-zA-Z0-9-_ \']+$']) }}
		</div>	
	</div>

	<div class="form-group row last">
		<label class="col-md-3 label-control">*Status</label>
		<div class="col-md-9">
			<div class="input-group col-md-9">
				<label class="inline custom-control custom-radio">
					<input type="radio" value="active" name="estat" class="eStatus custom-control-input" >
					<span class="custom-control-indicator"></span>
					<span class="custom-control-description ml-0">Active</span>
				</label>
				<label class="inline custom-control custom-radio">
					<input type="radio" value="inactive" name="estat"  class="eStatus custom-control-input" >
					<span class="custom-control-indicator"></span>
					<span class="custom-control-description ml-0">Inactive</span>
				</label>
			</div>
		</div>
	</div>
@endsection

@section('edit-modal-action')
	{{ Form::submit('Update', ['class' => 'btn btn-success']) }}
	<button type="button" data-dismiss="modal" class="btn btn-warning mr-1">Cancel</button>
@endsection

@section('page-action')
    <script type="text/javascript">
        $.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});

        var refreshTable = function() {
            $.ajax({
                url: "{{ url('/item/refresh') }}", 
                method: "GET", 
                datatype: "json", 
                success: function(data) {
                    $("#table-container").DataTable().clear().draw();
                    data = $.parseJSON(data);

                    for (index in data) {
                        var statusText = "";
						if (data[index].status == 1) {
							statusText = '<span class="tag round tag-default tag-success">Active</span>';
						}
						else {
							statusText = '<span class="tag round tag-default tag-danger">Inactive</span>';
						}

                        $('#table-container').DataTable()
							.row.add([
								data[index].itemName, 
								data[index].itemDescription, 
                                data[index].itemQuantity, 
                                data[index].itemPrice, 
								statusText,
								'<form method="POST" id="' + data[index].typeID + '" action="/service-type/delete" accept-charset="UTF-8"])' + 
									'<input type="hidden" name="itemID" value="' + data[index].itemID + '" />' + 
									'<button class="btn btn-icon btn-square btn-success normal edit"  type="button" value="' + data[index].itemID + '"><i class="icon-android-create"></i></button>' + 
									'<button class="btn btn-icon btn-square btn-danger delete" value="' + data[index].itemID + '" type="button" name="btnEdit"><i class="icon-android-delete"></i></button>' + 
								'</form>',
								null
							]).draw(true);
                    }
                }, 
                error: function(errors) {

					var message = "Error: ";
					var data = errors.responseJSON;
					for (datum in data) {
						message += data[datum];
					}

					swal("Error", "Cannot fetch table data!\n" + message, "error");
				}
            });
        }

        $("#frm-add").submit(function(event) {
            event.preventDefault();

            $.ajax({
                url: "{{ url('/item/store') }}",
                method: "POST", 
                data: {
                    "itemName": $("#aItemName").val(),
                    "itemQuantity": $("#aQuantity").val(), 
                    "itemPrice": $("#aPrice").val(), 
                    "itemDescription": $("#aDescription").val(), 
                    "quality": 1, 
                    "status": $(".aStatus:checked").val(), 
                    "archive": 0
                }, 
                success: function(data) {
                    $("#iconModal").modal("hide");
                    refreshTable();
					$("#frm-add").trigger("reset");
					swal("Success", "Successfully Added!", "success");
                }, 
                error: function(error) {
					var message = "Errors: ";
					var data = error.responseJSON;
					for (datum in data) {
						message += data[datum];
					}

					swal("Error", message, "error");
				}
            });
        });
    </script>
@endsection
