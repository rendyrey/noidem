<!--========================== Work Experience ======================= -->
<div class="col-xs-12">
	<div class="widget-box widget-color-orange">
		<div class="widget-header widget-header-blue">
			<h4 class="widget-title lighter">Work Experience</h4>
		</div>
		<div class="widget-body">
			<div class="widget-main">
				<div id="fuelux-wizard-container">
						<div class="step-pane active" data-step="1" id="more_work_experience">
								<div class="form-group">
									<label class="col-xs-12 col-sm-3 control-label no-padding-right">Line of Business</label>
									<div class="col-xs-12 col-sm-5">
										<select name="id_bidang_usaha" class="chosen-select form-control" id="id_bidang_usaha" data-placeholder="Choose ...">
											<option></option>
											@foreach($bidang_usaha as $value)
											<option value="{{$value->id}}">{{$value->bidang_usaha}}</option>
											@endforeach
										</select>
									</div>															
								</div>
								<div class="form-group" id="other_bidang_usaha">
									<label class="col-xs-12 col-sm-3 control-label no-padding-right">Other Line of Business</label>
									<div class="col-xs-12 col-sm-5">
										<span class="block input-icon input-icon-right">
										<input type="text" name="other_bidang_usaha" class="width-100">
										<i class="ace-icon fa fa-pencil-square-o"></i>
										</span>
									</div>															
								</div>
								<div class="form-group">
									<label class="col-xs-12 col-sm-3 control-label no-padding-right">Start Year</label>
									<div class="col-xs-12 col-sm-2">
										<select name='we_start_month' class="form-control">
											<option value="">Select Month</option>			
											@foreach($months as $name)
												<option value="{{$name}}">{{$name}}</option>
											@endforeach
										</select>
									</div>
									<div class="col-xs-12 col-sm-2">
										<select name="we_start_year" class="form-control">
											<option value="">Select Year</option>
											@foreach ($yearArray as $year)
											
											<option value="{{$year}}">{{$year}}</option>
											
											@endforeach
										</select>
									</div>
								</div>
									<div class="form-group">
										<label class="col-xs-12 col-sm-3 control-label no-padding-right">End Year</label>
										<div class="col-xs-12 col-sm-2">
											<select name='we_end_month' class="form-control">
											<option value="Present">Present</option>
																						
												@foreach ($months as $name)
													<option value="{{$name}}">{{$name}}</option>
												@endforeach
											
											</select>
										</div>
										<div class="col-xs-12 col-sm-2">
											<select name="we_end_year" class="form-control">
											<option value="Present">Present</option>
												@foreach ($yearArray as $year)							
												<option value="{{$year}}">{{$year}}</option>
												@endforeach
											</select>
										</div>
										<div class="col-xs-12 col-sm-2">
										<a class="btn btn-minier btn-primary" id="add"><i class="ace-icon fa fa-plus"></i></a>
										<a class="btn btn-minier btn-danger" id="remove_field"><i class="ace-icon fa fa-minus"></i></a>
										</div>	
									</div>																
							</div>
							
						</div>
						
					</div><!-- /.widget-main -->
				</div><!-- /.widget-body -->
			</div>
		</div><!-- /.col -->
<!--========================= Work Experience ===================== -->
