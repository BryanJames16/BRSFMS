//  EDIT STREET ON CHANGE

		$(document).on('change', '.estreet', function(e) {

			
			elotRefresh();

					setTimeout(function () {
						ebuildingRefresh();
					}, 1000);

					setTimeout(function () {
						eunitRefresh();
					}, 3000);
			
			
			

		});

		// END OF EDIT STREET ON CHANGE

		// EDIT LOT ON CHANGE

		$(document).on('change', '.elot', function(e) {

			
			
			ebuildingRefresh();
			setTimeout(function () {
				eunitRefresh();
			}, 1000);
			
			
		});

		// END OF END LOT ON CHANGE

		//END BUILDING ON CHANGE

		$(document).on('change', '.ebuilding', function(e) {

			eunitRefresh();
			
		});

		// END OF EDIT BUILDING ON CHANGE

//  STREET ON CHANGE

		$(document).on('change', '.street', function(e) {

			
			lotRefresh();

					setTimeout(function () {
						buildingRefresh();
					}, 1000);

					setTimeout(function () {
						unitRefresh();
					}, 3000);
			
			
			

		});

		// END OF STREET ON CHANGE

		//  LOT ON CHANGE

		$(document).on('change', '.lot', function(e) {

			
			
			buildingRefresh();
			setTimeout(function () {
				unitRefresh();
			}, 1000);
			
			
		});

		// END OF LOT ON CHANGE

		//BUILDINGLOT ON CHANGE

		$(document).on('change', '.building', function(e) {

			unitRefresh();
			
		});

		// END OF BUILDING ON CHANGE

////////////-------  LOT REFRESH  ----- ////////////////////////

		var lotRefresh = function() {

			var id = $('#street').val();
			console.log('Lot Refresh');

			$.ajax({
				type: 'get',
				url: "{{ url('/resident/getLot') }}", 
				async: 'false',
				data: {"streetID":id},  
				success: function(data) {

					var check= false;
					$('#lot').empty();
					data = $.parseJSON(data);

					for (index in data) {
						check = true;
						$('#lot').append(
							'<option value="'+ data[index].lotID +'">' + data[index].lotCode + '</option>'
						);
						console.log('Lot Code: ' + data[index].lotCode);
					}

					if(check){
						$('#lot').prop('disabled',false);
					}
					else{
						$('#lot').prop('disabled','disabled');
					}

				}, 
				error: function(data) {

					var message = "Error: ";
					var data = error.responseJSON;
					for (datum in data) {
						message += data[datum];
					}

					swal("Error", "Cannot fetch table data!\n" + message, "error");
					console.log("Error: Cannot refresh table!\n" + message);
				}
			});
		};

		

		///////////////----- BUILDING REFRESH ------------////////////

		var buildingRefresh = function(){

			var id = $('#lot').val();
			console.log('LOT ID: '+ $('#lot').val());

			$.ajax({
				type: 'get',
				url: "{{ url('/resident/getBuilding') }}", 
				async: 'false',
				data: {"lotID":id},  
				success: function(data) {

					var check = true;
					
					$('#building').empty();
					data = $.parseJSON(data);

					for (index in data) {
						check = false;
						$('#building').append(
							'<option value="'+ data[index].buildingID +'">' + data[index].buildingName + '</option>'
						);
						console.log('Building Name: ' + data[index].buildingName);
					}

					if(!check)
					{
						$('#building').prop('disabled',false);
					}
					else{
						$('#building').prop('disabled','disabled');
					}
				}, 
				error: function(data) {

					var message = "Error: ";
					var data = error.responseJSON;
					for (datum in data) {
						message += data[datum];
					}

					swal("Error", "Cannot fetch table data!\n" + message, "error");
					console.log("Error: Cannot refresh table!\n" + message);
				}
			});
		};

		///////////////----- UNIT REFRESH ------------////////////

		var unitRefresh = function(){

			var id = $('#building').val();
			console.log('Building ID: ' + id);

			$.ajax({
				type: 'get',
				url: "{{ url('/resident/getUnit') }}", 
				async: 'false',
				data: {"buildingID":id},  
				success: function(data) {

					var check = true;
					
					$('#unit').empty();
					data = $.parseJSON(data);

					for (index in data) {
						check = false;
						$('#unit').append(
							'<option value="'+ data[index].unitID +'">' + data[index].unitCode + '</option>'
						);
						console.log('Unit Name: ' + data[index].unitCode);
					}

					if(!check)
					{
						$('#unit').prop('disabled',false);
					}
					else{
						$('#unit').prop('disabled','disabled');
					}
				}, 
				error: function(data) {

					var message = "Error: ";
					var data = error.responseJSON;
					for (datum in data) {
						message += data[datum];
					}

					swal("Error", "Cannot fetch table data!\n" + message, "error");
					console.log("Error: Cannot refresh table!\n" + message);
				}
			});
		};
        
        ////////////-------EDIT  LOT REFRESH  ----- ////////////////////////

		var elotRefresh = function() {

			var id = $('#estreet').val();
			console.log('Lot Refresh');

			$.ajax({
				type: 'get',
				url: "{{ url('/resident/getLot') }}", 
				async: 'false',
				data: {"streetID":id},  
				success: function(data) {

					var check= false;
					$('#elot').empty();
					data = $.parseJSON(data);

					for (index in data) {
						check = true;
						$('#elot').append(
							'<option value="'+ data[index].lotID +'">' + data[index].lotCode + '</option>'
						);
						console.log('Lot Code: ' + data[index].lotCode);
					}

					if(check){
						$('#elot').prop('disabled',false);
					}
					else{
						$('#elot').prop('disabled','disabled');
					}

				}, 
				error: function(data) {

					var message = "Error: ";
					var data = error.responseJSON;
					for (datum in data) {
						message += data[datum];
					}

					swal("Error", "Cannot fetch table data!\n" + message, "error");
					console.log("Error: Cannot refresh table!\n" + message);
				}
			});
		};

		

		///////////////-----EDIT BUILDING REFRESH ------------////////////

		var ebuildingRefresh = function(){

			var id = $('#elot').val();
			console.log('LOT ID: '+ $('#elot').val());

			$.ajax({
				type: 'get',
				url: "{{ url('/resident/getBuilding') }}", 
				async: 'false',
				data: {"lotID":id},  
				success: function(data) {

					var check = true;
					
					$('#ebuilding').empty();
					data = $.parseJSON(data);

					for (index in data) {
						check = false;
						$('#ebuilding').append(
							'<option value="'+ data[index].buildingID +'">' + data[index].buildingName + '</option>'
						);
						console.log('Building Name: ' + data[index].buildingName);
					}

					if(!check)
					{
						$('#ebuilding').prop('disabled',false);
					}
					else{
						$('#ebuilding').prop('disabled','disabled');
					}
				}, 
				error: function(data) {

					var message = "Error: ";
					var data = error.responseJSON;
					for (datum in data) {
						message += data[datum];
					}

					swal("Error", "Cannot fetch table data!\n" + message, "error");
					console.log("Error: Cannot refresh table!\n" + message);
				}
			});
		};

		///////////////----- EDIT UNIT REFRESH ------------////////////

		var eunitRefresh = function(){

			var id = $('#ebuilding').val();
			console.log('Building ID: ' + id);

			$.ajax({
				type: 'get',
				url: "{{ url('/resident/getUnit') }}", 
				async: 'false',
				data: {"buildingID":id},  
				success: function(data) {

					var check = true;
					
					$('#eunit').empty();
					data = $.parseJSON(data);

					for (index in data) {
						check = false;
						$('#eunit').append(
							'<option value="'+ data[index].unitID +'">' + data[index].unitCode + '</option>'
						);
						console.log('Unit Name: ' + data[index].unitCode);
					}

					if(!check)
					{
						$('#eunit').prop('disabled',false);
					}
					else{
						$('#eunit').prop('disabled','disabled');
					}
				}, 
				error: function(data) {

					var message = "Error: ";
					var data = error.responseJSON;
					for (datum in data) {
						message += data[datum];
					}

					swal("Error", "Cannot fetch table data!\n" + message, "error");
					console.log("Error: Cannot refresh table!\n" + message);
				}
			});
		};
        