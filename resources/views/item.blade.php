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
    <th>Quantity</th>
    <th>Price</th>
	<th>Status</th>
	<th>Actions</th>
@endsection
