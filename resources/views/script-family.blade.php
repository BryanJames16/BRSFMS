<script type="text/javascript">

        $.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});

		//  FAMILY NEXT PK

		$("#btnFamilyModal").on('click', function() {
			$("#familyModal").modal('show');

			$.ajax({
				url: "{{ url('/family/nextPK') }}", 
				method: "GET", 
				success: function(data) {
					if (data == null) {
						console.log("Reponse is null!");
					}
					else {
						$("#familyID").val(data);
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

		//  END OF FAMILY NEXT PK

        // SUBMIT ADD FAMILY

		$("#frm-familyAdd").submit(function(event) {
			event.preventDefault();

			$.ajax({
				url: "{{ url('/family/store') }}", 
				method: "POST", 
				data: {
					"_token": "{{ csrf_token() }}", 
					"familyID": $("#familyID").val(), 
					"familyHeadID": $("#familyHeadID").val(), 
					"familyName": $("#familyName").val()
				}, 
				success: function(data) {
					$("#familyModal").modal("hide");
					refreshTable();
					familyRefreshTable();
					$("#frm-familyAdd").trigger("reset");
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

		// END OF SUBMIT ADD FAMILY

        //  ADD/REMOVE FAMILY MEMBER

		$(document).on('click', '.editMember', function(e) {
			var id = $(this).data('value');
			var frm = $('#frm-editMember');
			frm.find('#ffID').val(id);
			
			$.ajax({
				type: 'get',
				url: "{{ url('/family/getMembers') }}", 
				data: {"familyPrimeID":id}, 
				success:function(data)
				{
					$("#table-MemberContainer").DataTable().clear().draw();
					data = $.parseJSON(data);
					var gen;

					for (index in data)
					{

						var months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
						var date = new Date(data[index].birthDate);
						var month = date.getMonth();
						var day = date.getDate();
						var year = date.getFullYear();
						var d = months[month] + ' ' + day + ', ' + year;

						if(data[index].gender=='M')
						{
							gen = "Male";
						}
						else
						{
							gen= "Female";
						}
						$("#famName").html(
							"<p>Family Name: " + data[index].familyName + "</p>"
						);

						

						$("#table-MemberContainer").DataTable()
								.row.add([ 
									data[index].firstName + ' ' + data[index].middleName.substring(0,1) + '. ' + data[index].lastName,
									gen,
									data[index].memberRelation,
									d, 
									
										'<form method="POST" id="' + data[index].residentPrimeID + '" action="/family/delete" accept-charset="UTF-8"])' + 
											'<input type="hidden" name="residentPrimeID" value="' + data[index].residentPrimeID + '" />' +

											'<span class="dropdown">' +
												'<button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-primary dropdown-toggle dropdown-menu-right"><i class="icon-cog3"></i></button>'+ 
												'<span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">' +
													'<a href="#" class="dropdown-item updateRelation" name="btnUpdate" data-value="' + data[index].familyMemberPrimeID + '"><i class="icon-eye6"></i> Update Relation</a>' +
													'<a href="#" class="dropdown-item deleteMember" name="btnDelete" data-value="' + data[index].residentPrimeID + '"><i class="icon-trash4"></i> Remove</a>' +
												'</span>' +
											'</span>' + 
											'</form>'
									]).draw(false);
					}

					$.ajax({
						type: 'get',
						url: "{{ url('/family/getFamilyHead') }}", 
						data: {"familyPrimeID":id}, 
						success:function(data)
						{
							data = $.parseJSON(data);

							for (index in data)
							{
								console.log(data);
								$("#headName").html(
								"<p>Head: " + data[index].firstName + " " + data[index].middleName + " " + data[index].lastName + "</p>");
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
					familyRefreshTable();
					$('#editMember').modal('show');
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

		//  END OF ADD/REMOVE FAMILY MEMBER

        //  DELETE FAMILY 

		$(document).on('click', '.deleteFamily', function(e) {
			var id = $(this).data('value');
			$.ajax({
					type: 'GET',
					url: "{{ url('/family/getEdit') }}",
					data: {"familyPrimeID": id},
					success:function(data) {
						
							swal({
							title: "Are you sure you want to delete " + data.familyName + "?",
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
									url: "{{ url('/family/delete') }}", 
									data: {"_token": "{{ csrf_token() }}",
									familyPrimeID:id}, 
									success: function(data) {
										familyRefreshTable();
										swal("Successfull", "Family removed!", "success");
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
			})

		});

		//  END OF DELETE FAMILY

		//  VIEW FAMILY MEMBERS

		$(document).on('click', '.viewMember', function(e) {
			var id = $(this).data('value');

			$.ajax({
				type: 'get',
				url: "{{ url('/family/getMembers') }}", 
				data: {"familyPrimeID":id}, 
				success:function(data)
				{

					

                    $('#members').html('');
					data = $.parseJSON(data);
					console.log(data);	

					for(index in data)
					{

						var months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
						var date = new Date(data[index].birthDate);
						var month = date.getMonth();
						var day = date.getDate();
						var year = date.getFullYear();
						var d = months[month] + ' ' + day + ', ' + year;

						$('#members').append(
							'<div class="col-xl-3 col-md-6 col-xs-12">'+
								'<div class="card">'+
									'<div class="text-xs-center">'+
										'<div class="card-block">'+
											'<img src="/storage/upload/'+ data[index].imagePath +'" class="rounded-circle  height-150" alt="No image yet" />'+
										'</div>'+
										'<div class="card-block">'+
											'<h4 class="card-title">'+ data[index].lastName + ', ' + data[index].firstName + ' ' + data[index].middleName + '</h4>'+
											'<h6 class="card-subtitle text-muted">' + data[index].memberRelation+ '</h6>'+
											'<h6 class="text-muted">' + d + '</h6>'+
										'</div>'+
									'</div>'+
								'</div>'+
							'</div>'
						);
					}
					
					$('#viewMember').modal('show');
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

		//  END OF VIEW FAMILY MEMBER

		//  UPDATE RELATION MODAL

		$(document).on('click', '.updateRelation', function(e) {
			var id = $(this).data('value');

			$.ajax({
				type: 'get',
				url: "{{ url('/family/getRelation') }}", 
				data: {"familyMemberPrimeID":id}, 
				success:function(data)
				{
					data = $.parseJSON(data);
					var frm = $('#frm-updateRelation');
					

					for (index in data)
					{
						frm.find('#rel').val(data[index].memberRelation);	
						frm.find('#familyMemberPrimeID').val(data[index].familyMemberPrimeID);	
						$("#resName").html(data[index].firstName + " " + data[index].middleName + " " + data[index].lastName);
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
			
			$('#editMember').modal('hide');
			
			setTimeout(function() {
				$('#updateRel').modal('show');	
			},500);
	

		});

		//  END OF UPDATE RELATION MODAL

		// SUBMIT UPDATE RELATION

		$("#frm-updateRelation").submit(function(event) {
			event.preventDefault();
			console.log($("#rel").val());

			$.ajax({
				url: "{{ url('/family/updateRelation') }}", 
				method: "POST", 
				data: {
					"_token": "{{ csrf_token() }}", 
					"familyMemberPrimeID": $("#familyMemberPrimeID").val(), 
					"memberRelation": $("#rel").val()
				}, 
				success: function(data) {

					var id = $('#ffID').val();

					$('#updateRel').modal('hide');	
					swal("Success", "Successfully Updated!", "success");

					$.ajax({
						type: 'get',
						url: "{{ url('/family/getMembers') }}", 
						data: {"familyPrimeID":id}, 
						success:function(data)
						{
							$("#table-MemberContainer").DataTable().clear().draw();
							data = $.parseJSON(data);
							var gen;

							for (index in data)
							{

								var months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
								var date = new Date(data[index].birthDate);
								var month = date.getMonth();
								var day = date.getDate();
								var year = date.getFullYear();
								var d = months[month] + ' ' + day + ', ' + year;

								if(data[index].gender=='M')
								{
									gen = "Male";
								}
								else
								{
									gen= "Female";
								}
								$("#famName").html(
									"<p>Family Name: " + data[index].familyName + "</p>"
								);

								

								$("#table-MemberContainer").DataTable()
										.row.add([ 
											data[index].firstName + ' ' + data[index].middleName.substring(0,1) + '. ' + data[index].lastName,
											gen,
											data[index].memberRelation,
											d, 
											
												'<form method="POST" id="' + data[index].residentPrimeID + '" action="/family/delete" accept-charset="UTF-8"])' + 
													'<input type="hidden" name="residentPrimeID" value="' + data[index].residentPrimeID + '" />' +

													'<span class="dropdown">' +
														'<button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-primary dropdown-toggle dropdown-menu-right"><i class="icon-cog3"></i></button>'+ 
														'<span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">' +
															'<a href="#" class="dropdown-item updateRelation" name="btnUpdate" data-value="' + data[index].familyMemberPrimeID + '"><i class="icon-eye6"></i> Update Relation</a>' +
															'<a href="#" class="dropdown-item deleteMember" name="btnDelete" data-value="' + data[index].residentPrimeID + '"><i class="icon-trash4"></i> Remove</a>' +
														'</span>' +
													'</span>' + 
													'</form>'
											]).draw(false);
							}

							$.ajax({
								type: 'get',
								url: "{{ url('/family/getFamilyHead') }}", 
								data: {"familyPrimeID":id}, 
								success:function(data)
								{
									data = $.parseJSON(data);

									for (index in data)
									{
										console.log(data);
										$("#headName").html(
										"<p>Head: " + data[index].firstName + " " + data[index].middleName + " " + data[index].lastName + "</p>");
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
							$('#editMember').modal('show');
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

		// END OF UPDATE RELATION SUBMIT

		//VIEW MEMBERS FROM ADD/REMOVE
		$(document).on('click', '.viewMem', function(e) {
			
			
			$('#addMember').modal('hide');
			
			setTimeout(function() {
				$('#editMember').modal('show');
			},500);
		});
		//

		//  ADD MEMBERS

		$(document).on('click', '.addMember', function(e) {
			
			var id = $("#ffID").val();
			var frm = $('#frm-addResident');
			frm.find('#fID').val(id)

			$.ajax({
				url: '/resident/notMember/' + id, 
				method: "GET", 
				datatype: "json", 

				success: function(data) {
					$("#table-addResident").DataTable().clear().draw();
					data = $.parseJSON(data);
					var gen;

					for (index in data) {

						var months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
						var date = new Date(data[index].birthDate);
						var month = date.getMonth();
						var day = date.getDate();
						var year = date.getFullYear();
						var d = months[month] + ' ' + day + ', ' + year;

						if(data[index].gender=='M')
						{
							gen = "Male";
						}
						else
						{
							gen= "Female";
						}
						$("#table-addResident").DataTable()
								.row.add([
									data[index].lastName + ', ' + data[index].firstName + ' ' + data[index].middleName, 
									d, 
									gen, 
									data[index].contactNumber,
									'<select class ="form-control border-info selectBox" name="type" id="relation'+data[index].residentPrimeID+'">' +
											'<option value="Self">Self</option>'+
											'<option value="Wife">Wife</option>'+
											'<option value="Husband">Husband</option>'+
											'<option value="Mother">Mother</option>'+
											'<option value="Father">Father</option>'+
											'<option value="Son">Son</option>'+
											'<option value="Daughter">Daughter</option>'+
											'<option value="Sister">Sister</option>'+
											'<option value="Brother">Brother</option>'+
											'<option value="Uncle">Uncle</option>'+
											'<option value="Auntie">Auntie</option>'+
											'<option value="Grandmother">Grandmother</option>'+
											'<option value="Grandfather">Grandfather</option>'+
											'<option value="Grandson">Grandson</option>'+
										'</select>',
									'<button class="btn btn-icon btn-square btn-success normal addMem"  type="button" value="' + data[index].residentPrimeID + '">Add</button>'
									
								]).draw(false);
					}
					familyRefreshTable();
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

			$('#editMember').modal('hide');
			
			setTimeout(function() {
				$('#addMember').modal('show');
			},500);

			

		});

		//  END OF ADD MEMBERS

		//  ADD MEMBER SUBMIT 

		$(document).on('click', '.addMem', function(e) {
			
			var id = $(this).val();
			var frm = $('#frm-addResident');
			
			$.ajax({
				url: "{{ url('/resident/join') }}", 
				method: "POST", 
				data: {
					"_token": "{{ csrf_token() }}", 
					"familyPrimeID": $("#fID").val(),
					"memberRelation": $("#relation"+id).val(), 
					"peoplePrimeID": id
				}, 
				success: function(data) {
					$.ajax({
						url: '/resident/notMember/' + $("#fID").val(), 
						method: "GET", 
						datatype: "json", 

						success: function(data) {
							$("#table-addResident").DataTable().clear().draw();
							data = $.parseJSON(data);
							var gen;

							for (index in data) {
								

								var months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
								var date = new Date(data[index].birthDate);
								var month = date.getMonth();
								var day = date.getDate();
								var year = date.getFullYear();
								var d = months[month] + ' ' + day + ', ' + year;

								if(data[index].gender=='M')
								{
									gen = "Male";
								}
								else
								{
									gen= "Female";
								}

								$("#table-addResident").DataTable()
										.row.add([
											data[index].lastName + ', ' + data[index].firstName + ' ' + data[index].middleName, 
											d, 
											gen, 
											data[index].contactNumber,
											'<select class ="form-control border-info selectBox" name="type" id="relation'+data[index].residentPrimeID+'">' +
											'<option value="Self">Self</option>'+
											'<option value="Wife">Wife</option>'+
											'<option value="Husband">Husband</option>'+
											'<option value="Mother">Mother</option>'+
											'<option value="Father">Father</option>'+
											'<option value="Son">Son</option>'+
											'<option value="Daughter">Daughter</option>'+
											'<option value="Sister">Sister</option>'+
											'<option value="Brother">Brother</option>'+
											'<option value="Uncle">Uncle</option>'+
											'<option value="Auntie">Auntie</option>'+
											'<option value="Grandmother">Grandmother</option>'+
											'<option value="Grandfather">Grandfather</option>'+
											'<option value="Grandson">Grandson</option>'+
										'</select>',
											'<button class="btn btn-icon btn-round btn-success normal addMem"  type="button" value="' + data[index].residentPrimeID + '">Add</button>'
											
										]).draw(false);
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
					familyRefreshTable();
					swal("Success", "Successfully Added member!", "success");

                    $.ajax({
                        type: 'get',
                        url: "{{ url('/family/getMembers') }}", 
                        data: {"familyPrimeID":$("#fID").val()}, 
                        success:function(data)
                        {
                            $("#table-MemberContainer").DataTable().clear().draw();
                            data = $.parseJSON(data);
							var gen;

                            for (index in data)
                            {


								var months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
								var date = new Date(data[index].birthDate);
								var month = date.getMonth();
								var day = date.getDate();
								var year = date.getFullYear();
								var d = months[month] + ' ' + day + ', ' + year;

								if(data[index].gender=='M')
								{
									gen = "Male";
								}
								else
								{
									gen= "Female";
								}

                                $("#famName").html(
                                    "<p>Family Name: " + data[index].familyName + "</p>"
                                );

                               

                                $("#table-MemberContainer").DataTable()
                                        .row.add([ 
                                            data[index].firstName + ' ' + data[index].middleName.substring(0,1) + '. ' + data[index].lastName,
                                            gen,
                                            data[index].memberRelation,
                                            d, 
                                            
                                                '<form method="POST" id="' + data[index].residentPrimeID + '" action="/family/delete" accept-charset="UTF-8"])' + 
                                                    '<input type="hidden" name="residentPrimeID" value="' + data[index].residentPrimeID + '" />' +

                                                    '<span class="dropdown">' +
                                                        '<button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-primary dropdown-toggle dropdown-menu-right"><i class="icon-cog3"></i></button>'+ 
                                                        '<span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">' +
                                                            '<a href="#" class="dropdown-item updateRelation" name="btnUpdate" data-value="' + data[index].familyMemberPrimeID + '"><i class="icon-eye6"></i> Update Relation</a>' +
                                                            '<a href="#" class="dropdown-item deleteMember" name="btnDelete" data-value="' + data[index].residentPrimeID + '"><i class="icon-trash4"></i> Remove</a>' +
                                                        '</span>' +
                                                    '</span>' + 
                                                    '</form>'
                                            ]).draw(false);
                            }

							$.ajax({
								type: 'get',
								url: "{{ url('/family/getFamilyHead') }}", 
								data: {"familyPrimeID":id}, 
								success:function(data)
								{
									data = $.parseJSON(data);

									for (index in data)
									{
										console.log(data);
										$("#headName").html(
										"<p>Head: " + data[index].firstName + " " + data[index].middleName + " " + data[index].lastName + "</p>");
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

		

		//  END OF ADD MEMBER SUBMIT

        //  DELETE FAMILY MEMBER

		$(document).on('click', '.deleteMember', function(e) {

			var id = $(this).data('value');
			
			$.ajax({
					type: 'GET',
					url: "{{ url('/resident/getEdit') }}",
					data: {"residentPrimeID": id},
					success:function(data) {
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
									url: "{{ url('/resident/memberRemove') }}", 
									data: {"_token": "{{ csrf_token() }}",
									familyPrimeID:$('#ffID').val(),
									peoplePrimeID:id}, 
									success: function(data) {
										$.ajax({
											type: 'get',
											url: "{{ url('/family/getMembers') }}", 
											data: {"familyPrimeID":$('#ffID').val()}, 
											success:function(data)
											{
												$("#table-MemberContainer").DataTable().clear().draw();
												data = $.parseJSON(data);
												var gen;


												for (index in data)
												{

													var months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
													var date = new Date(data[index].birthDate);
													var month = date.getMonth();
													var day = date.getDate();
													var year = date.getFullYear();
													var d = months[month] + ' ' + day + ', ' + year;

													if(data[index].gender=='M')
													{
														gen = "Male";
													}
													else
													{
														gen= "Female";
													}

													$("#famName").html(
														"<p>Family Name: " + data[index].familyName + "</p>"
													);

													

													$("#table-MemberContainer").DataTable()
															.row.add([ 
																data[index].firstName + ' ' + data[index].middleName.substring(0,1) + '. ' + data[index].lastName,
																gen,
																data[index].memberRelation,
																d, 
																
																	'<form method="POST" id="' + data[index].residentPrimeID + '" action="/family/delete" accept-charset="UTF-8"])' + 
																		'<input type="hidden" name="residentPrimeID" value="' + data[index].residentPrimeID + '" />' +

																		'<span class="dropdown">' +
																			'<button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-primary dropdown-toggle dropdown-menu-right"><i class="icon-cog3"></i></button>'+ 
																			'<span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">' +
																				'<a href="#" class="dropdown-item updateRelation" name="btnUpdate" data-value="' + data[index].familyMemberPrimeID + '"><i class="icon-eye6"></i> Update Relation</a>' +
																				'<a href="#" class="dropdown-item deleteMember" name="btnDelete" data-value="' + data[index].residentPrimeID + '"><i class="icon-trash4"></i> Remove</a>' +
																			'</span>' +
																		'</span>' + 
																		'</form>'
																]).draw(false);
												}

												$.ajax({
													type: 'get',
													url: "{{ url('/family/getFamilyHead') }}", 
													data: {"familyPrimeID":$('#ffID').val()}, 
													success:function(data)
													{
														data = $.parseJSON(data);

														for (index in data)
														{
															console.log(data);
															$("#headName").html(
															"<p>Head: " + data[index].firstName + " " + data[index].middleName + " " + data[index].lastName + "</p>");
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
										familyRefreshTable();
										swal("Successfull", "Member removed!", "success");
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

		//  END OF DELETE FAMILY MEMBER


	</script>