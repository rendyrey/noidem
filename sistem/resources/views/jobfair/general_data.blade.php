<!--================================ General Data ==================== -->
<form class="form-horizontal" id="sample-form" action="{{url('tambah_pelamar_jobfair')}}" method="post" enctype="multipart/form-data">
	<div class="row">
		<div class="col-xs-12">
			<div class="widget-box widget-color-orange">
				<div class="widget-header widget-header-blue">
					<h4 class="widget-title lighter">General Data</h4>
				</div>
				<div class="widget-body">
					<div class="widget-main">
						<div id="fuelux-wizard-container">
							<div class="step-pane active" data-step="1">
								{{-- <div class="form-group">
								<label class="col-xs-12 col-sm-3 control-label no-padding-right">No. Applicant</label>

								<div class="col-xs-12 col-sm-5">
								<span class="block input-icon input-icon-right">
								<input type="text" name="no_applicant" class="width-100" />
								<i class="ace-icon fa fa-pencil-square-o"></i>
							</span>
						</div>
					</div> --}}
					@for ($i=1; $i <= $jml_loker; $i++)
						<div class="form-group">
							<label class="col-xs-12 col-sm-3 control-label no-padding-right">Job Interest #{{$i}}</label>

							<div class="col-xs-12 col-sm-5">
								<select class="form-control" name="job_interest_{{$i}}" id="interest_{{$i}}" data-placeholder="Choose ...">
									
									@foreach ($loker as $value)
										<option value="{{$value->no_rcr}}">{{$value->position_publish}}</option>
									@endforeach
								</select>
								{{-- {{Form::select('job_interest_'.$i,$loker_opt,'',['class'=>'form-control'])}} --}}
							</div>
						</div>
					@endfor
					<button id="refresh_interest" type="button">Reset</button> click this button if you want to reorder job interests
					<input type="hidden" name="id_iklan" value="{{$id_iklan}}">
					{{-- <div class="form-group">
					<label class="col-xs-12 col-sm-3 control-label no-padding-right">Job Interest</label>

					<div class="col-xs-12 col-sm-5">
					<select class="chosen-select form-control" name="job_interest_1" id="form-field-select-3" data-placeholder="Choose ...">
					<option value="">  </option>
					<option value="Innovation Engineering">Innovation Engineering</option>
				</select>
			</div>
		</div>
		<div class="form-group">
		<label class="col-xs-12 col-sm-3 control-label no-padding-right"></label>

		<div class="col-xs-12 col-sm-5">
		<select class="chosen-select form-control" name="job_interest_2" id="form-field-select-3" data-placeholder="Choose ...">
		<option value="">  </option>
		<option value="Maintenance Engineering">Maintenance Engineering</option>
	</select>
</div>
</div>
<div class="form-group">
<label class="col-xs-12 col-sm-3 control-label no-padding-right"></label>

<div class="col-xs-12 col-sm-5">
<select class="chosen-select form-control" name="job_interest_3" id="form-field-select-3" data-placeholder="Choose ...">
<option value="">  </option>
<option value="Warehouse & Distribution">Warehouse & Distribution</option>
</select>
</div>
</div>
<div class="form-group">
<label class="col-xs-12 col-sm-3 control-label no-padding-right"></label>

<div class="col-xs-12 col-sm-5">
<select class="chosen-select form-control" name="job_interest_4" id="form-field-select-3" data-placeholder="Choose ...">
<option value="">  </option>
<option value="International Marketing">International Marketing</option>
</select>
</div>
</div>

<div class="form-group" id="medion_employee_name" hidden>
<label class="col-xs-12 col-sm-3 control-label no-padding-right">Medion Employee Name</label>

<div class="col-xs-12 col-sm-5">
<span class="block input-icon input-icon-right">
<input type="text" name="medion_employee_name" class="width-100" placeholder="Type name here" />
<i class="ace-icon fa fa-user"></i>
</span>
</div>
</div> --}}
</div>
</div>
</div><!-- /.widget-main -->
</div><!-- /.widget-body -->
</div>
</div><!-- /.col -->
<!--================================= General Data ========================== -->
