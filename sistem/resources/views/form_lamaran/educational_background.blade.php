<!-- =================== Educational Background ================ -->
<div class="col-xs-12">
	<div class="widget-box widget-color-orange">
		<div class="widget-header widget-header-blue">
			<h4 class="widget-title lighter">Educational Background</h4>
		</div>
		<div class="widget-body">
			<div class="widget-main">
				<div id="fuelux-wizard-container">
						<div class="step-pane active" data-step="1" id="edu_background">
								<div class="form-group">
									<label class="col-xs-12 col-sm-3 control-label no-padding-right">Education Level</label>
									<div class="col-xs-12 col-sm-5">
										<div class="btn-group" data-toggle="buttons">
										@foreach($tingkat_pendidikan as $value)
											<label class="btn btn-white">
											<input type="radio" name="id_tingkat_pendidikan" id="{{$value->tingkat}}" autocomplete="off" value="{{$value->id}}"> {{$value->tingkat}}
											</label>
										@endforeach
										</div>
									</div>
								</div>

								<div class="form-group">
									<label class="col-xs-12 col-sm-3 control-label no-padding-right">Institution Name</label>

									<div class="col-xs-12 col-sm-5">
										<select name="id_institusi" class="chosen-select form-control" id="id_institusi" data-placeholder="Choose ...">
										<option></option>
										@foreach($institusi as $value)
										<option value="{{$value->id}}">{{$value->nama_institusi}}</option>
										@endforeach
										</select>
									</div>															
								</div>
								<div class="form-group" id="other_institusi">
									<label class="col-xs-12 col-sm-3 control-label no-padding-right">Other Institution Name</label>

									<div class="col-xs-12 col-sm-5">
										<span class="block input-icon input-icon-right">
										<input type="text" name ="other_institusi" class="width-100">
										<i class="ace-icon fa fa-pencil-square-o"></i>
										</span>
									</div>															
								</div>
								<div class="form-group">
									<label class="col-xs-12 col-sm-3 control-label no-padding-right">Major</label>

									<div class="col-xs-12 col-sm-5">
										<select name="id_major" class=" chosen-select form-control" id="id_major" data-placeholder="Choose ...">
											<option></option>
											@foreach ( $attributes as $key => $attr )
											@if(is_numeric($key))   
      										<optgroup label="{{$key}}" hidden>
      										@else
      										<optgroup label="{{$key}}">
      										@endif
        									@foreach ( $attr as $keys => $value )
            								<option value="{{$keys}}">{{$value}}</option>
        									@endforeach
      										</optgroup>
      										@endforeach
										</select>
									</div>															
								</div>
								<div class="form-group" id="other_major">
									<label class="col-xs-12 col-sm-3 control-label no-padding-right">Other Major</label>

									<div class="col-xs-12 col-sm-5">
										<span class="block input-icon input-icon-right">
										<input type="text" name ="other_major" class="width-100">
										<i class="ace-icon fa fa-pencil-square-o"></i>
										</span>
									</div>															
								</div>
								<div class="form-group">
									<label class="col-xs-12 col-sm-3 control-label no-padding-right">GPA</label>

									<div class="col-xs-12 col-sm-2">
										<span class="block input-icon input-icon-right">
											<input type="text" name="gpa" class="justNumber width-100" maxlength="4" />
										<label>ex. 3.21</label>
										</span>
									</div>															
								</div>
								<div class="form-group">
									<label class="col-xs-12 col-sm-3 control-label no-padding-right">Start Year</label>
									<div class="col-xs-12 col-sm-2">
										<select name="start_month_education" class="form-control" required>
										<option value="">Select Month</option>
										@foreach($months as $name)
											<option value="{{$name}}">{{$name}}</option>
										@endforeach
										</select>
									</div>
									
									<div class="col-xs-12 col-sm-2">
										<select name="start_year_education" class="form-control" required>
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
										<select name="end_month_education" class="form-control">
										<option value="">Select Month</option>
										@foreach($months as $name)
											<option value="{{$name}}">{{$name}}</option>
										@endforeach
										</select>
									</div>

									<div class="col-xs-12 col-sm-2">
										<select name="end_year_education" class="form-control">
										<option value="">Select Year</option>
										@foreach ($yearArray as $year)
									
										<option value="{{$year}}">{{$year}}</option>
									
										@endforeach
										</select>
									</div>
								</div>
						</div>

						<!-- More -->					
						<div class="step-pane active" data-step="1" id="more_edu">
						<br>
						<h4>More Educational Background</h4>
						<hr>
								<div class="form-group">
									<label class="col-xs-12 col-sm-3 control-label no-padding-right">Education Level</label>
									<div class="col-xs-12 col-sm-5">
										<div class="btn-group" data-toggle="buttons">
										@foreach($tingkat_pendidikan_more as $value)
										@if($value->tingkat == "D3")
											<label class="btn btn-white" style="display: none;">
										@else
											<label class="btn btn-white">
										@endif
											<input type="radio" name="id_tingkat_pendidikan_more"  autocomplete="off" value="{{$value->id}}"> {{$value->tingkat}}
											</label>
										@endforeach
										</div>
									</div>
								</div>

								<div class="form-group">
									<label class="col-xs-12 col-sm-3 control-label no-padding-right">Institution Name</label>

									<div class="col-xs-12 col-sm-5">
										<select name="id_institusi_more" class="chosen-select form-control" id="id_institusi_more" data-placeholder="Choose ...">
										<option></option>
										@foreach($institusi as $value)
										<option value="{{$value->id}}">{{$value->nama_institusi}}</option>
										@endforeach
										</select>
									</div>															
								</div>
								<div class="form-group" id="other_institusi_more">
									<label class="col-xs-12 col-sm-3 control-label no-padding-right">Other Institution Name</label>

									<div class="col-xs-12 col-sm-5">
										<span class="block input-icon input-icon-right">
										<input type="text" name ="other_institusi_more" class="width-100">
										<i class="ace-icon fa fa-pencil-square-o"></i>
										</span>
									</div>															
								</div>
								<div class="form-group">
									<label class="col-xs-12 col-sm-3 control-label no-padding-right">Major</label>

									<div class="col-xs-12 col-sm-5">
										<select name="id_major_more" class="chosen-select form-control" id="id_major_more" data-placeholder="Choose ...">
											<option></option>
											@foreach ( $attributes as $key => $attr )    
      										<optgroup label="{{$key}}">
        									@foreach ( $attr as $keys => $value )
            								<option value="{{$keys}}">{{$value}}</option>
        									@endforeach
      										</optgroup>
      										@endforeach
										</select>
									</div>															
								</div>
								<div class="form-group" id="other_major_more">
									<label class="col-xs-12 col-sm-3 control-label no-padding-right">Other Major</label>

									<div class="col-xs-12 col-sm-5">
										<span class="block input-icon input-icon-right">
										<input type="text" name ="other_major_more" class="width-100">
										<i class="ace-icon fa fa-pencil-square-o"></i>
										</span>
									</div>															
								</div>
								<div class="form-group">
									<label class="col-xs-12 col-sm-3 control-label no-padding-right">GPA</label>

									<div class="col-xs-12 col-sm-2">
										<span class="block input-icon input-icon-right">
											<input type="text" name="gpa_more" class="justNumber width-100" maxlength="4" />
										<label>ex. 3.21</label>
										</span>
									</div>															
								</div>
								<div class="form-group">
									<label class="col-xs-12 col-sm-3 control-label no-padding-right">Start Year</label>
									<div class="col-xs-12 col-sm-2">
										<select name="start_month_education_more" class="form-control">
										@foreach($months as $name)
											<option value="{{$name}}">{{$name}}</option>
										@endforeach
										</select>
									</div>

									<div class="col-xs-12 col-sm-2">
										<select name="start_year_education_more" class="form-control">
										@foreach ($yearArray as $year)
										@if($year == $cur_year)
										<option value="{{$year}}" selected>{{$year}}</option>
										@else
										<option value="{{$year}}">{{$year}}</option>
										@endif
										@endforeach
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-xs-12 col-sm-3 control-label no-padding-right">End Year</label>
									<div class="col-xs-12 col-sm-2">
										<select name="end_month_education_more" class="form-control">
										@foreach($months as $name)
											<option value="{{$name}}">{{$name}}</option>
										@endforeach
										</select>
									</div>

									<div class="col-xs-12 col-sm-2">
										<select name="end_year_education_more" class="form-control">
										@foreach ($yearArray as $year)
										@if($year == $cur_year)
										<option value="{{$year}}" selected>{{$year}}</option>
										@else
										<option value="{{$year}}">{{$year}}</option>
										@endif
										@endforeach
										</select>
									</div>
								</div>
						</div>
				</div>
			</div><!-- /.widget-main -->
		</div><!-- /.widget-body -->
	</div>
</div><!-- /.col -->
<!--================== Educational Background ============================== -->