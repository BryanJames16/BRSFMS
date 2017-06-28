<div class="modal fade text-xs-left" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">

			<div class="modal-header">
			
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			
				<h4 class="modal-title" id="myModalLabel2"><i class="icon-road2"></i>
					Add Facility 
				</h4>
			
			</div>

			<div class="modal-body">
				<div class="card-block">
					
					<div class="panel=body">
						{!!Form::open(['url'=>'updateByAjax','method'=>'POST','id'=>'frm-update'])!!}
						{!!Form::hidden('primeID',null,['id'=>'primeID'])!!}
						<div class="row">

							<div class="col-md-12">
								<div class="form-group">
									{!!Form::label('id','ID')!!}
									{!!Form::text('id', null, ['id'=>'id', 'class' => 'form-control'])!!}
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									{!!Form::label('facility','Facility')!!}
									{!!Form::text('facility', null, ['id'=>'facility', 'class' => 'form-control'])!!}
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									{!!Form::label('desc','Description')!!}
									{!!Form::text('desc', null, ['id'=>'desc', 'class' => 'form-control'])!!}
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									{!!Form::label('day','Day Price')!!}
									{!!Form::text('day', null, ['id'=>'day', 'class' => 'form-control'])!!}
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									{!!Form::label('night','Night Price')!!}
									{!!Form::text('night', null, ['id'=>'night', 'class' => 'form-control'])!!}
								</div>
							</div>
						</div>

						<div class='row'>
							<div class="col-md-6">
								<div class="form-group">
									{!!Form::label('type','Type')!!}
									{!!Form::select('role_id',$roles,null,['id'=>'role_id','class'=>'form-control'])!!}
								</div>
							</div>
							
							<div class="form-group row last">
								<label class="col-md-6 label-control">*Status</label>
								<div class="col-md-6">
									<div class="input-group col-md-9">
										<label class="inline custom-control custom-radio">
											<input type="radio" value="active" name="stat"  class="custom-control-input" >
											<span class="custom-control-indicator"></span>
											<span class="custom-control-description ml-0">Active</span>
										</label>
										<label class="inline custom-control custom-radio">
											<input type="radio" value="inactive" name="stat"  class="custom-control-input" >
											<span class="custom-control-indicator"></span>
											<span class="custom-control-description ml-0">Inactive</span>
										</label>
									</div>
								</div>
							</div>

							<div class="col-md-12">
								
									{!!Form::submit('Save',['class'=>'btn btn-primary'])!!}
									<button type="button" data-dismiss="modal"  data-style="slide-left" class="btn btn-warning mr-1">Cancel</button>
							
							</div>
						</div>



						{!!Form::close()!!}
					</div>
					

					<div class="form-actions center">
						</div>													
				</div>
			</div>
			<!-- End of Modal Body -->
		</div>
	</div>
</div>