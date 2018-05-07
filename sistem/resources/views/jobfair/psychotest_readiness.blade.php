<!--=========================== Psychotest Readiness ========================== -->
<div class="col-xs-12">
	<div class="widget-box widget-color-orange">
		<div class="widget-header widget-header-blue">
			<h4 class="widget-title lighter">Psychotest Readiness</h4>
		</div>
		<div class="widget-body">
			<div class="widget-main">
				<div id="fuelux-wizard-container">
					<div class="step-pane active" data-step="1">
						<div class="form-group">
							<label class="col-xs-12 col-sm-3 control-label no-padding-right">Date</label>

							<div class="col-xs-12 col-sm-5">
								<select name="id_tanggal_psychotest" class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose ...">
									<option></option>
									{{-- <option value="16/07/2014">16/07/2014</option> --}}
									@foreach($tanggal_psychotest as $value)
										<?php $tanggal = date('d M Y',strtotime($value->tanggal)); ?>
										<option value="{{$value->id}}">{{$tanggal}} - {{$value->kota->kota}}</option>
									@endforeach
								</select>
							</div>
						</div>
						{{-- <div class="form-group">
						<label class="col-xs-12 col-sm-3 control-label no-padding-right">Venue</label>

						<div class="col-xs-12 col-sm-5">
						<select name="id_tanggal_psychotest" class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose ..." onchange='other_venue(this.value);'>
						<option></option>
						@foreach($kota as $value)
						<option value="{{$value->kota}}">{{$value->kota}}</option>
					@endforeach
					<option value="Other">Other...</option>
				</select>
			</div>
		</div> --}}
		<div class="form-group" id="other_venue" style="display: none">
			<label class="col-xs-12 col-sm-3 control-label no-padding-right">Venue</label>

			<div class="col-xs-12 col-sm-5">
				<input type="text" name="other_psychotest_venue" class="width-100">
			</div>
		</div>
	</div>
</div>
</div><!-- /.widget-main -->
</div><!-- /.widget-body -->
</div>
</div><!-- /.col -->
<!--========================== Psychotest Readiness =============== -->
