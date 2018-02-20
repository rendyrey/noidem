<!--=================== Educational Background ================ -->
<div class="col-xs-12">
	<div class="widget-box widget-color-orange">
		<div class="widget-header widget-header-blue">
			<h4 class="widget-title lighter">Educational Background</h4>
		</div>
		<div class="widget-body">
			<div class="widget-main">
				<div id="fuelux-wizard-container">
					<div class="step-pane active" data-step="1">
							<div class="form-group">
								<label class="col-xs-12 col-sm-3 control-label no-padding-right">Education Level</label>
								<div class="col-xs-12 col-sm-5">
									<div class="btn-group" data-toggle="buttons">
									@foreach($tingkat_pendidikan as $value)
										<label class="btn btn-white">
										<input type="radio" name="education_level" autocomplete="off" value="{{$value->tingkat}}"> {{$value->tingkat}}
										</label>
									@endforeach
									</div>
								</div>
							</div>

							<div class="form-group">
								<label class="col-xs-12 col-sm-3 control-label no-padding-right">Institution Name</label>

								<div class="col-xs-12 col-sm-5">
									<select name="institusi" class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose ..." onchange='other_institusi(this.value);'>
									<option></option>
									@foreach($institusi as $value)
									<option value="{{$value->nama_institusi}}">{{$value->nama_institusi}}</option>
									@endforeach																
									<option value="Other">Other...</option>
									</select>
								</div>															
							</div>
							<div class="form-group" id="institusi" style="display: none">
								<label class="col-xs-12 col-sm-3 control-label no-padding-right">Institution Name</label>

								<div class="col-xs-12 col-sm-5">
									<span class="block input-icon input-icon-right">
									<input type="text" name ="other_institusi_name" class="width-100">
									<i class="ace-icon fa fa-pencil-square-o"></i>
									</span>
								</div>															
							</div>
							<div class="form-group">
								<label class="col-xs-12 col-sm-3 control-label no-padding-right">Major Group</label>

								<div class="col-xs-12 col-sm-5">
									<select name="major_group" class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose ..." onchange='other_major(this.value);'>
										<option></option>
										@foreach ( $attributes as $key => $attr )    
  										<optgroup label="{{$key}}">
    									@foreach ( $attr as $value )
        								<option value="{{$value}}">{{$value}}</option>
    									@endforeach
  										</optgroup>
  										@endforeach
										<option value="Other">Other...</option>
									</select>
								</div>															
							</div>
							<div class="form-group" id="major" style="display: none">
								<label class="col-xs-12 col-sm-3 control-label no-padding-right">Major Group</label>

								<div class="col-xs-12 col-sm-5">
									<span class="block input-icon input-icon-right">
									<input type="text" name ="other_major_group" class="width-100">
									<i class="ace-icon fa fa-pencil-square-o"></i>
									</span>
								</div>															
							</div>
							<div class="form-group">
								<label class="col-xs-12 col-sm-3 control-label no-padding-right">GPA</label>

								<div class="col-xs-12 col-sm-2">
									<span class="block input-icon input-icon-right">
										<input type="text" name="gpa" class="width-100" />
									<label>ex. 3.21</label>
									</span>
								</div>															
							</div>
							<div class="form-group">
								<label class="col-xs-12 col-sm-3 control-label no-padding-right">Start Year</label>
								<div class="col-xs-12 col-sm-2">
									<select name="in_start_year" class="form-control">
									<?php
										foreach ($yearArray as $year) {
											$selected = ($year == $cur_year) ? 'selected' : '';
											echo '<option '.$selected.' value="'.$year.'">'.$year.'</option>';
										}
									?>
									</select>
								</div>

								<label class="col-xs-12 col-sm-1 control-label no-padding-right">End Year</label>
								<div class="col-xs-12 col-sm-2">
									<select name="in_end_year" class="form-control">
									<?php
										foreach ($yearArray as $year) {
											$selected = ($year == $cur_year) ? 'selected' : '';
											echo '<option '.$selected.' value="'.$year.'">'.$year.'</option>';
										}
									?>
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