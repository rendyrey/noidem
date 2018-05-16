<!-- ================================ General Data ==================== -->
<div class="col-xs-12">
	<div class="widget-box widget-color-orange">
		<div class="widget-header widget-header-blue">
			<h4 class="widget-title lighter">General Data</h4>
		</div>
		<div class="widget-body">
			<div class="widget-main">
				<div id="fuelux-wizard-container">
					<div class="step-pane active" data-step="1">

						<div class="form-group">
							<label class="col-xs-12 col-sm-3 control-label no-padding-right">Where did you find this vacancy?</label>
							<div class="col-xs-12 col-sm-5">
								<br>
								<select id="adv_cat" class="form-control" name="id_iklan"  placeholder="Choose ...">
									<option value="">  </option>
									@foreach ( $arr_iklan as $key => $val )
										@if(is_numeric($key))
											<optgroup label="{{$key}}" hidden>
											@else
												<optgroup label="{{$key}}">
												@endif
												@foreach ( $val as $keys => $value )
													<option value="{{$keys}}" {{$keys==old('id_iklan') ? 'selected':''}}>{{$value}}</option>
												@endforeach
											</optgroup>
										@endforeach
									</select>
									<small id="com_adv_cat">This choice determines the open vacancies</small><br>
									<font color="red">{{$errors->first('id_iklan')}}</font>
									<input type="text" id="jml_loker" name="jml_loker" class="width-100" hidden />
								</div>
							</div>

							@for($a=1; $a<=$count_loker; $a++)
								<div class="form-group" id="lbl_job_{{$a}}" hidden>
									<label class="col-xs-12 col-sm-3 control-label no-padding-right">Job Interest {{$a}}</label>
									<div class="col-xs-12 col-sm-5">
										<select class="form-control" name="job_interest_{{$a}}" id="interest_{{$a}}" placeholder="Choose ...">
											@foreach($job_interest as $value)
												<option value="{{$value->no_rcr}}" name="{{$value->id}}">{{$value->position_publish}}</option>
											@endforeach
										</select>
										<font color="red">{{$errors->first('job_interest_1')}}</font>
									</div>
								</div>
							@endfor
							<button id="refresh_interest" type="button">Reset</button> click this button if you want to reorder job interests

							<div class="form-group" id="medion_employee_name" hidden>
								<label class="col-xs-12 col-sm-3 control-label no-padding-right">Medion Employee Name</label>

								<div class="col-xs-12 col-sm-5">
									<span class="block input-icon input-icon-right">
										<input type="text" name="medion_employee_name" class="width-100" placeholder="Type name here" />
										<i class="ace-icon fa fa-user"></i>
									</span>
								</div>
							</div>
						</div>
					</div>
				</div><!-- /.widget-main -->
			</div><!-- /.widget-body -->
		</div>
	</div><!-- /.col -->
	<!--================================= General Data ========================== -->
