<table class="table table-striped table-bordered multi-ordering" style="font-size:14px;width:100%;" id="table-container">
    <thead>
    	<tr>
			<th>Name</th>
			<th>Status</th>
			<th>Actions</th>
		</tr>
	</thead>

	<tbody>
		@foreach($facilitytype as $key => $u)
			<tr>
				<td>{{ $u->typeName}}</td>
				@if ($u -> status == 1)
					<td>Active</td>
				@else
					<td>Inactive</td>
				@endif
				<td>
					<button class='btn btn-icon btn-round btn-success normal edit'  type='button' value='{{ $u -> typeID }}'><i class="icon-android-create"></i></button>
					<button class='btn btn-icon btn-round btn-danger delete' value='{{ $u -> typeID }}' type='button' name='btnEdit'><i class="icon-android-delete"></i></button>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>