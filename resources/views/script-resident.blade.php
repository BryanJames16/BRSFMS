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
					"email": $("#email").val(),    
					"gender": $("#gender :selected").val(), 
					"birthDate": $("#birthDate").val(), 
					"civilStatus": $("#civilStatus").val(), 
					"seniorCitizenID": $("#seniorCitizenID").val(), 
					"disabilities": $("#disabilities").val(), 
					"residentType": $("#residentType").val(),
					"address": $("#address").val(),
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

			$('#workHistory').data('value', id);

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

						var dis = "N/A";
						var sen = "N/A";

						if(data[index].disabilities!=null)
						{
							dis = data[index].disabilities;
						}
						if(data[index].seniorCitizenID!=null)
						{
							sen = data[index].seniorCitizenID;
						}

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
							"Address: " + data[index].address + "<br>" +
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
							"Senior Citizen ID: "+ sen + "<br>" + 
							"Disabililities: "+dis + "<br>" +  
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
					data = $.parseJSON(data);

					for (index in data)
					{
						
						var frm = $('#frm-update');

						frm.find('#eresidentPrimeID').val(data[index].residentPrimeID);
						frm.find('#eresidentID').val(data[index].residentID);
						frm.find('#efirstName').val(data[index].firstName);
						frm.find('#emiddleName').val(data[index].middleName);
						frm.find('#elastName').val(data[index].lastName);
						frm.find('#esuffix').val(data[index].suffix);
						frm.find('#egender').val(data[index].gender);
						frm.find('#eaddress').val(data[index].address);
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

						frm.find('#eemail').val(data[index].email);
						
						

						$('#editModal').modal('show');
						
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
						"address": $("#eaddress").val(),
						"currentWork": $("#ework").val(),
						"email": $("#eemail").val(),
						"monthlyIncome": $("#esalary").val(),
						"hiddenIncome": $("#hiddenIncome").val(),
						"hiddenWork": $("#hiddenWork").val(),

						
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