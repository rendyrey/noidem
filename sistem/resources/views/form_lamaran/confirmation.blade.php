<!--============================= Confirmation ======================== -->
<div class="col-xs-12">
<div class="widget-box widget-color-orange">
	<div class="widget-header widget-header-blue">
		<h4 class="widget-title lighter">Confirmation</h4>
	</div>
	<div class="widget-body">
		<div class="widget-main">
			<div id="fuelux-wizard-container">
					<div class="step-pane active" data-step="1">
						<div class="form-group">
							<label class="col-xs-12 col-sm-5 control-label no-padding-right">Do you ever had practical work in our company?</label>
							<div class="col-xs-12 col-sm-7">
								<div class="btn-group" data-toggle="buttons">
									<label class="btn btn-white">
									<input type="radio" name="pernah_pkl_dimedion" id="confirm_practical_yes" autocomplete="off" value="Yes"> Yes
									</label>
									<label class="btn btn-white">
									<input type="radio" name="pernah_pkl_dimedion" id="confirm_practical_no" autocomplete="off" value="No"> No
									</label>
								</div>
							</div>
						</div>

						<div class="form-group" id="confirm_practical_date" hidden>
							<label class="col-xs-12 col-sm-2 control-label no-padding-right">From</label>
							<div class="col-xs-12 col-sm-2">
								<select name='practical_start_month' class="form-control">			
									@foreach($months as $name)
										<option value="{{$name}}">{{$name}}</option>
									@endforeach
								</select>
							</div>
							<div class="col-xs-12 col-sm-2">
								<select name="practical_start_year" class="form-control">
									@foreach ($yearArray as $year)
									@if($year == $cur_year)
									<option value="{{$year}}" selected>{{$year}}</option>
									@else
									<option value="{{$year}}">{{$year}}</option>
									@endif
									@endforeach
								</select>
							</div>
							<label class="col-xs-12 col-sm-1 control-label pull-left">To </label>
							<div class="col-xs-12 col-sm-2">
								<select name='practical_end_month' class="form-control">			
									@foreach($months as $name)
										<option value="{{$name}}">{{$name}}</option>
									@endforeach
								</select>
							</div>
							<div class="col-xs-12 col-sm-2">
								<select name="practical_end_year" class="form-control">
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
							<label class="col-xs-12 col-sm-5 control-label no-padding-right">Did you ever had followed the psychotest in our company?</label>
							<div class="col-xs-12 col-sm-7">
								<div class="btn-group" data-toggle="buttons">
									<label class="btn btn-white">
										<input type="radio" name="pernah_psychotest_dimedion" id="confirm_followed_yes" autocomplete="off" value="Yes"> Yes
									</label>
									<label class="btn btn-white">
										<input type="radio" name="pernah_psychotest_dimedion" id="confirm_followed_no" autocomplete="off" value="No"> No
									</label>									
								</div>																
							</div>																
						</div>

						<div class="form-group" id="confirm_followed_date" hidden>
							<label class="col-xs-12 col-sm-5 control-label no-padding-right">When ?</label>
							<div class="col-xs-12 col-sm-2">
								<select name='tgl_psychotest_month' class="form-control">			
									@foreach($months as $name)
										<option value="{{$name}}">{{$name}}</option>
									@endforeach
								</select>
							</div>
							<div class="col-xs-12 col-sm-2">
								<select name="tgl_psychotest_year" class="form-control">
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
							<label class="col-xs-12 col-sm-5 control-label no-padding-right">Have you filled in this application form correctly?</label>
							<div class="col-xs-12 col-sm-7">
								<div class="btn-group" data-toggle="buttons">
										<label class="btn btn-white" name="confirm_yes">
										<input type="radio" name="confirm_correctly" id="confirm_yes" value="Yes"> Yes
									</label>
										<label class="btn btn-white">
										<input type="radio" name="confirm_correctly" id="confirm_no" value="No"> No
										</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-xs-12 col-sm-12" align="right">
								<button type="submit" id="simpan_lamaran" class="btn btn-white btn-default btn-round" disabled><i class="ace-icon fa fa-floppy-o bigger-120 blue"></i>Submit</button>
								<!-- <button type="reset" class="btn btn-white btn-default btn-round"><i class="ace-icon fa fa-times red2"></i>Cancel</button> -->
							</div>																
						</div>
					</div>
				</div>
			</div><!-- /.widget-main -->
		</div><!-- /.widget-body -->
	</div>
</div><!-- /.col -->
<!--====================== Confirmation ======================= -->