<!--========================== Work Experience ======================= -->
<div class="col-xs-12">
	<div class="widget-box widget-color-orange">
		<div class="widget-header widget-header-blue">
			<h4 class="widget-title lighter">Work Experience</h4>
		</div>
		<div class="widget-body">
			<div class="widget-main">
				<div id="fuelux-wizard-container">
						<div class="step-pane active" data-step="1">
								<div class="form-group">
									<label class="col-xs-12 col-sm-3 control-label no-padding-right">Line of Business</label>

									<div class="col-xs-12 col-sm-5">
										<select name="line_of_business" class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose ..." onchange='line_business(this.value);'>
											<option></option>
											@foreach($bidang_usaha as $value)
											<option value="{{$value->bidang_usaha}}">{{$value->bidang_usaha}}</option>
											@endforeach
											<option value="Other">Other..</option>
										</select>
									</div>															
								</div>
								<div class="form-group" id="line_business" style="display: none">
									<label class="col-xs-12 col-sm-3 control-label no-padding-right">Line of Business</label>

									<div class="col-xs-12 col-sm-5">
										<input type="text" name="other_line_of_business" class="width-100">
									</div>															
								</div>
								<div class="form-group">
									<label class="col-xs-12 col-sm-3 control-label no-padding-right">Start Year</label>
									<div class="col-xs-12 col-sm-2">
										<select name='lb_start_month' class="form-control">
										<?php											
											foreach ($months as $num => $name) {
												printf('<option value="%s">%s</option>', $num, $name);
												}
										?>
										</select>
									</div>
									<div class="col-xs-12 col-sm-2">
										<select name="lb_start_year" class="form-control">
										<?php
											foreach ($yearArray as $year) {
												$selected = ($year == $cur_year) ? 'selected' : '';
												echo '<option '.$selected.' value="'.$year.'">'.$year.'</option>';
											}
										?>
										</select>
									</div>
									</div>
									<div class="form-group">
									<label class="col-xs-12 col-sm-3 control-label no-padding-right">End Year</label>
									<div class="col-xs-12 col-sm-2">
										<select name='lb_end_month' class="form-control">
										<option value="Present">Present</option>
										<?php											
											foreach ($months as $num => $name) {
												printf('<option value="%s">%s</option>', $num, $name);
												}
										?>
										</select>
									</div>
									<div class="col-xs-12 col-sm-2">
										<select name="lb_end_year" class="form-control">
										<option value="Present">Present</option>
										<?php
											foreach ($yearArray as $year) {
												$selected = ($year == $cur_year) ? '' : '';
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
<!--========================= Work Experience ===================== -->