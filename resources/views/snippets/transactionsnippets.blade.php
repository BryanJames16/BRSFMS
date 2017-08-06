<!--  WIZARD STEPS 
															{{Form::open(['url'=>'resident/store', 'method' => 'POST', 'id' => 'frm-add', 'class'=>'number-tab-steps wizard-notification'])}}

															

															<h6>Name</h6>
															<fieldset>
																<div class="row">
																	<div class="col-md-6">
																		<div class="form-group">
																			<label for="firstName1">First Name :</label>
																			<input type="text" class="form-control" id="firstName" />
																		</div>
																	</div>

																	<div class="col-md-6">
																		<div class="form-group">
																			<label for="firstName1">Middle Name :</label>
																			<input type="text" class="form-control" id="middleName" />
																		</div>
																	</div>

																	<div class="col-md-6">
																		<div class="form-group">
																			<label for="firstName1">Last Name :</label>
																			<input type="text" class="form-control" id="lastName" />
																		</div>
																	</div>

																	<div class="col-md-6">
																		<div class="form-group">
																			<label for="firstName1">Suffix :</label>
																			<input type="text" class="form-control" id="suffix" />
																		</div>
																	</div>
																</div>

																<div class="row">
																	<div class="col-md-6">
																		<div class="form-group">
																			<label for="emailAddress1">Gender : </label>
																			<select name="gender" id="gender" class="form-control">
																				<option value="male">MALE</option>
																				<option value="female">FEMALE</option>
																			</select>
																		</div>
																	</div>
																</div>
															</fieldset>

															<h6>Additional Vital Info</h6>
															<fieldset>
																<div class="row">
																	<div class="col-md-6">
																		<div class="form-group">
																			<label for="emailAddress1">Birth Date : </label>
																			<input type="date" class="form-control" id="birthDate" />
																		</div>
																	</div>
																</div>

																<div class="row">
																	<div class="col-md-6">
																		<div class="form-group">
																			<label for="emailAddress1">Civil Status : </label>
																			<select class="form-control">
																				<option>Married</option>
																				<option>Single</option>
																				<option>Widowed</option>
																				<option>Divorced</option>
																			</select>
																		</div>
																	</div>

																	<div class="col-md-6">
																		<div class="form-group">
																			<label for="emailAddress1">Senior Citizen ID : </label>
																			<input type="text" class="form-control" id="firstName1" />
																		</div>
																	</div>

																	<div class="col-md-6">
																		<div class="form-group">
																			<label for="emailAddress1">Disabilities : </label>
																			<input type="textarea" class="form-control" id="firstName1" />
																		</div>
																	</div>

																	<div class="col-md-6">
																		<div class="form-group">
																			<label for="emailAddress1">Contact Number : </label>
																			<input type="text" class="form-control" id="contactNumber" />
																		</div>
																	</div>
																</div>

																<div class="row">
																	<div class="col-md-6">
																		<div class="form-group">
																			<label for="emailAddress1">Resident Type : </label>
																			<select class="form-control">
																				<option>Transient Resident</option>
																				<option>Official Resident</option>
																			</select>
																		</div>
																	</div>
																</div>
															</fieldset>

															<h6>Address</h6>
															<fieldset>
																<div class="row">

																	

																	<div class="col-md-6">
																		<div class="form-group">
																			<label for="address">Street : </label>
																			{{ Form::select('barangayID', $streets, null, ['id'=>'barangayID', 'class' => 'form-control']) }}
																		</div>
																	</div>

																	<div class="col-md-6">
																		<div class="form-group">
																			<label for="address">Lot : </label>
																			{{ Form::select('barangayID', $streets, null, ['id'=>'barangayID', 'class' => 'form-control']) }}
																		</div>
																	</div>

																	<div class="col-md-6">
																		<div class="form-group">
																			<label for="address">House : </label>
																			{{ Form::select('barangayID', $streets, null, ['id'=>'barangayID', 'class' => 'form-control']) }}
																		</div>
																	</div>

																	<div class="col-md-6">
																		<div class="form-group">
																			<label for="address">Unit : </label>
																			{{ Form::select('barangayID', $streets, null, ['id'=>'barangayID', 'class' => 'form-control']) }}
																		</div>
																	</div>
																</div>
															</fieldset>

															<h6>Resident Background</h6>
															<fieldset>
																<div class="row">
																	<div class="col-md-6">
																		<div class="form-group">
																			<label for="address">Current Work : </label>
																			<input type="text" class="form-control" id="work" />
																		</div>
																	</div>

																	<div class="col-md-6">
																		<div class="form-group">
																			<label for="address">Monthly Salary: </label>
																			<select class="form-control">
																				<option value ="1">₱0-₱10,000</option>
																				<option value="2">₱10,001-₱50,000</option>
																				<option value="3">₱50,001-₱100,000</option>
																				<option value="4">₱100,001 and above</option>
																			</select>
																		</div>
																	</div>
																</div>
															</fieldset>

															<h6>Summary</h6>
															<fieldset>
																
															</fieldset>
														{{Form::close()}}
-->