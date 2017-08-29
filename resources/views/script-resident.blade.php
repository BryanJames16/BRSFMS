<script type="text/javascript">

        $.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});

		//  RESIDENT NEXT PK

		$("#btnAddModal").on('click', function() {
			$("#addModal").modal('show');

			

			$.ajax({
				url: "{{ url('/resident/nextPK') }}", 
				method: "GET", 
				success: function(data) {
					if (data == null) {
						console.log("Reponse is null!");
					}
					else {
						$("#residentID").val(data);
					}

					lotRefresh();

					setTimeout(function () {
						buildingRefresh();
					}, 500);

					setTimeout(function () {
						unitRefresh();
					}, 2000);
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

			
		});

		//  END OF RESIDENT NEXT PK

        //  SUBMIT ADD RESIDENT

		$("#frm-add").submit(function(event) {
			event.preventDefault();

			$.ajax({
				url: "{{ url('/resident/store') }}", 
				method: "POST", 
				data: {
					"_token": "{{ csrf_token() }}", 
					"residentID": $("#residentID").val(), 
					"lastName": $("#lastName").val(), 
					"middleName": $("#middleName").val(), 
					"firstName": $("#firstName").val(), 
					"suffix": $("#suffix").val(),
					"contactNumber": $("#contactNumber").val(),  
					"gender": $("#gender :selected").val(), 
					"birthDate": $("#birthDate").val(), 
					"civilStatus": $("#civilStatus").val(), 
					"seniorCitizenID": $("#seniorCitizenID").val(), 
					"disabilities": $("#disabilities").val(), 
					"residentType": $("#residentType").val(),
					"streetID": $("#street").val(),
					"lotID": $("#lot").val(),
					"buildingID": $("#building").val(),
					"unitID": $("#unit").val(),
					"addressType": $("#addressType").val(),
					"currentWork": $("#work").val(),
					"monthlyIncome": $("#salary").val(),
					
				}, 
				success: function(data) {
					$("#addModal").modal("hide");
					refreshTable();
					familyRefreshTable();
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

		//  END OF SUBMIT ADD RESIDENT

        //  VIEW RESIDENT

		$(document).on('click', '.view', function(e) {
			var id = $(this).data('value');

			$.ajax({
				type: 'get',
				url: "{{ url('/resident/getEdit') }}", 
				data: {"residentPrimeID":id}, 
				success:function(data)
				{

					data = $.parseJSON(data);

					for (index in data)
					{

						var months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
						var date = new Date(data[index].birthDate);
						var month = date.getMonth();
						var day = date.getDate();
						var year = date.getFullYear();
						var d = months[month] + ' ' + day + ', ' + year;

						var sal = data[index].monthlyIncome;

						if(data[index].currentWork=='None')
						{
							sal = "None";
						}

						var gen;
						if(data[index].gender=='M')
						{
							gen = "Male";
						}
						else
						{
							gen = "Female";
						}

						$('#viewName').html(
						"<p style='font-size:20px' align='center'>"+
						"<b>" + 
						data[index].lastName + ", " + data[index].firstName + " " + 
						data[index].middleName + " " + 
						"</b>"+
						"</p>"
						);
					
						$('#viewBirth').html(
							"<p style='font-size:15px' align='center'>"+
							"Birthday: " + d +
							"</p>"
							);
						$('#viewContact').html(
							"<p style='font-size:15px' align='center'>"+
							"Contact Number: "+data[index].contactNumber
							);
						$('#viewAddtl').html(
							"<p style='font-size:15px' align='center'>"+
							"Gender: "+gen + "<br>" + 
							"Civil Status: "+data[index].civilStatus + "<br>" +
							"Senior Citizen ID: "+data[index].seniorCitizenID + "<br>" + 
							"Disabililities: "+data[index].disabilities + "<br>" +  
							"Current Work: "+data[index].currentWork + "<br>" + 
							"Monthly Income: "+ sal + "<br>" + 
							"Resident Type: "+data[index].residentType + "<br>"
						);
						$('#resPic').html(
							'<img style="width:200px;height:180" src="/storage/upload/'+ data[index].imagePath+ '" alt="No image yet">'+
							"<span width='20px'></span>"
						);
						

						$('#viewModal').modal('show');
					}
					
				}, 
				error: function(data) {
					var message = "Error: ";
					var data = error.responseJSON;
					for (datum in data) {
						message += data[datum];
					}

					swal("Error", "Cannot fetch data!\n" + message, "error");
					console.log("Error: Cannot fetch data!\n" + message);
				}
			})

		});


		//  END OF VIEW RESIDENT

		// ADD IMAGE

		$(document).on('click', '.addImage', function(e) {
			var id = $(this).data('value');
			console.log(id);
			var frm = $('#frm-addImage');
			frm.find('#rID').val(id);

			$('#addImageModal').modal('show');
		
		});

		// END OF ADD IMAGE

        //  ADD TO FAMILY MODAL

		$(document).on('click', '.add', function(e) {

			var id = $(this).data('value');

			$.ajax({
				type: 'get',
				url: "{{ url('/resident/getEdit') }}", 
				data: {"residentPrimeID":id}, 
				success:function(data)
				{
					console.log(data);
					data = $.parseJSON(data);
					var frm = $('#frm-addToFam');

					for (index in data)
					{
						frm.find('#resID').val(data[index].residentPrimeID);
						console.log("RES ID: "+ $('#resID').val());
					}
				}, 
				error: function(data) {
					var message = "Error: ";
					var data = error.responseJSON;
					for (datum in data) {
						message += data[datum];
					}

					swal("Error", "Cannot fetch data!\n" + message, "error");
					console.log("Error: Cannot fetch data!\n" + message);
				}
			})

			
			
			$('#memberModal').modal('show');

		});

		//  END OF ADD TO FAMILY MODAL

        //  JOIN TO FAMILY


		$(document).on('click', '.join', function(e) {
			
			var id = $(this).val();

			$.ajax({
				url: "{{ url('/resident/join') }}", 
				method: "POST", 
				data: {
					"_token": "{{ csrf_token() }}", 
					"familyPrimeID": $("#famID").val(), 
					"peoplePrimeID": $("#resID").val(), 
					"memberRelation": $("#memberRelation").val()
				}, 
				success: function(data) {
					$("#memberModal").modal("hide");
					refreshTable();
					familyRefreshTable();
					$("#frm-addToFam").trigger("reset");
					swal("Success", "Successfully Added to family!", "success");
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

		//  END OF JOIN TO FAMILY

        //  EDIT RESIDENT ACTION

		$(document).on('click', '.edit', function(e) {
			var id = $(this).data('value');

			$.ajax({
				type: 'get',
				url: "{{ url('/resident/getEdit') }}", 
				data: {"residentPrimeID":id}, 
				success:function(data)
				{
					console.log(data);
					data = $.parseJSON(data);
					var lotid = "";
					var buildingid = "";
					var unitid = "";
					
					for (index in data)
					{
						
						var frm = $('#frm-update');
						frm.find('#estreet').val(data[index].streetID);
						elotRefresh();

						frm.find('#eresidentPrimeID').val(data[index].residentPrimeID);
						frm.find('#eresidentID').val(data[index].residentID);
						frm.find('#efirstName').val(data[index].firstName);
						frm.find('#emiddleName').val(data[index].middleName);
						frm.find('#elastName').val(data[index].lastName);
						frm.find('#esuffix').val(data[index].suffix);
						frm.find('#egender').val(data[index].gender);
						frm.find('#ebirthDate').val(data[index].birthDate);
						frm.find('#ecivilStatus').val(data[index].civilStatus);
						frm.find('#eseniorCitizenID').val(data[index].seniorCitizenID);
						frm.find('#edisabilities').val(data[index].disabilities);
						frm.find('#eresidentType').val(data[index].residentType);
						frm.find('#econtactNumber').val(data[index].contactNumber);
						frm.find('#eaddresstype').val(data[index].addressType);
						frm.find('#epersonAddressID').val(data[index].personAddressID);
						frm.find('#hiddenWork').val(data[index].currentWork);
						frm.find('#hiddenIncome').val(data[index].monthlyIncome);
						frm.find('#ework').val(data[index].currentWork);
						frm.find('#esalary').val(data[index].monthlyIncome);
						

						lotid= data[index].lotID;
						buildingid= data[index].buildingID;
						unitid= data[index].unitID;
						
						

						$('#editModal').modal('show');
						
					}

					setTimeout(function () {
						frm.find('#elot').val(lotid);
					}, 500);
					
					setTimeout(function () {
						ebuildingRefresh();

						setTimeout(function () {
							frm.find('#ebuilding').val(buildingid);
						}, 1000);
						
					}, 500);

					setTimeout(function () {
						eunitRefresh();

						setTimeout(function () {
							frm.find('#eunit').val(unitid);
						}, 1000);
						
					}, 2000);
					

					
				}, 
				error: function(data) {
					var message = "Error: ";
					var data = error.responseJSON;
					for (datum in data) {
						message += data[datum];
					}

					swal("Error", "Cannot fetch data!\n" + message, "error");
					console.log("Error: Cannot fetch data!\n" + message);
				}
			})

		});

		//  END OF EDIT RESIDENT ACTION

		//  UPDATE RESIDENT

		$("#frm-update").submit(function(event) {
			event.preventDefault();
			
			var frm = $('#frm-update');


			$.ajax({
				url: "{{ url('/resident/update') }}",
				type: "POST",
				data: {	"_token": "{{ csrf_token() }}",
						"residentPrimeID": $("#eresidentPrimeID").val(), 
						"residentID": $("#eresidentID").val(), 
						"firstName": $("#efirstName").val(), 
						"middleName": $("#emiddleName").val(),
						"lastName": $("#elastName").val(),
						"suffix": $("#esuffix").val(), 
						"gender": $("#egender").val(),
						"birthDate": $("#ebirthDate").val(),
						"civilStatus": $("#ecivilStatus").val(),
						"seniorCitizenID": $("#eseniorCitizenID").val(),
						"disabilities": $("#edisabilities").val(),
						"residentType": $("#eresidentType").val(),
						"contactNumber": $("#econtactNumber").val(),
						"personAddressID": $("#epersonAddressID").val(),
						"lotID": $("#elot").val(),
						"streetID": $("#estreet").val(),
						"unitID": $("#eunit").val(),
						"buildingID": $("#ebuilding").val(),
						"addressType": $("#eaddressType").val(),
						"currentWork": $("#ework").val(),
						"monthlyIncome": $("#esalary").val(),
						"hiddenWork": $("#hiddenIncome").val(),
						"hiddenIncome": $("#hiddenWork").val(),

						
				}, 
				success: function ( _response ){
					$("#editModal").modal('hide');
					
					familyRefreshTable();
					refreshTable();
					
					swal("Successful", 
							"Resident has been updated!", 
							"success");
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

		//  END OF UPDATE RESIDENT

		//  DELETE RESIDENT

		$(document).on('click', '.delete', function(e) {

			var id = $(this).data('value');
			$.ajax({
					type: 'GET',
					url: "{{ url('/resident/getEdit') }}",
					data: {"residentPrimeID": id},
					success:function(data) {
						console.log(data);
						data = $.parseJSON(data);
						for(index in data)
						{
							swal({
								title: "Are you sure you want to delete " + data[index].firstName + "?",
								text: "",
								type: "warning",
								showCancelButton: true,
								confirmButtonColor: "#DD6B55",
								confirmButtonText: "DELETE",
								closeOnConfirm: false
								},
								function() {
									$.ajax({
										type: "post",
										url: "{{ url('/resident/delete') }}", 
										data: {"_token": "{{ csrf_token() }}",
										residentPrimeID:id}, 
										success: function(data) {
											refreshTable();
											familyRefreshTable();
											swal("Successfull", "Entry is deleted!", "success");
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
								});	
						}			
					}
			})
		});

		//  END OF DELETE RESIDENT

		

	</script>