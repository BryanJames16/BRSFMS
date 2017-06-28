<table class="table">
	<thead>
		<tr>
			<th>ID</th>
			<th>Facility</th>
			<th>Description</th>
			<th>Type</th>
			<th>Day Price</th>
			<th>Night Price</th>
			<th>Status</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		@foreach($facilities as $key => $u)
			<tr>
				<td>{{ $u->facilityID}}</td>
				<td>{{ $u->facilityName}}</td>
				<td>{{ $u->facilityDesc}}</td>
				<td>{{ $u->typename}}</td>
				<td>{{ $u->facilityDayPrice}}</td>
				<td>{{ $u->facilityNightPrice}}</td>
				<td>{{ $u->status}}</td>
				<td>
					<button class='btn btn-icon btn-round btn-success normal edit'  type='button' value='{{ $u -> primeID }}'><i class="icon-android-create">Edit</i></button>
					<button class='btn btn-icon btn-round btn-danger delete' value='{{ $u -> primeID }}' type='button' name='btnEdit'><i class="icon-android-delete">Delete</i></button>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>