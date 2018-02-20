<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>PT. Medion Farma Jaya</title>
		<meta name="description" content="and Validation" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="shortcut icon"  href="assets/medion.ico"/>
		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />
		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="assets/css/jquery-ui.custom.min.css" />

		<link rel="stylesheet" href="assets/css/chosen.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-datepicker3.min.css" />
		<!-- text fonts -->
		<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />
		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
		<link rel="stylesheet" href="assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />
		<script src="assets/js/ace-extra.min.js"></script>

	</head>
	<style>
	.container {max-width: 1000px;}
	</style>
	<style>
	label[name=confirm_yes]:active {
		color: red;
	}
	</style>

	<body background="assets/bg.jpg">
	<div class="container">
			<div class="main-content">
					<div class="page-content">
						<div class="page-header">
							<img src="assets/banner.jpg" class="img-responsive">
						</div><!-- /.page-header -->
						<form class="form-horizontal" id="sample-form">
						<div class="row">
						<!--================================================ General Data ========================================= -->
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
																<label class="col-xs-12 col-sm-3 control-label no-padding-right">No. Applicant</label>

																<div class="col-xs-12 col-sm-5">
																	<span class="block input-icon input-icon-right">
																		<input type="text" name="no_applicant" class="width-100" />
																		<i class="ace-icon fa fa-pencil-square-o"></i>
																	</span>
																</div>
															</div>

															<div class="form-group">
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

															<div class="form-group">
																<label class="col-xs-12 col-sm-3 control-label no-padding-right">Where did you find vacancy?</label>

																<div class="col-xs-12 col-sm-9">
																	<div class="checkbox">
																	<table>
																	<tr>
																	<td>
																		<label>
																		<input name="vacancy[]" type="checkbox" class="ace" value="Company Website" />
																		<span class="lbl"> Company Website</span>
																		</label>
																	</td>
																	<td>
																		<label>
																		<input name="vacancy[]" type="checkbox" class="ace" value="Magazine" />
																		<span class="lbl"> Magazine</span>
																		</label>
																	</td>
																	<td>
																		<label>
																		<input name="vacancy[]" type="checkbox" class="ace" value="Job Fair" />
																		<span class="lbl"> Job Fair</span>
																		</label>
																	</td>
																	</tr>
																	<tr>
																	<td>
																		<label>
																		<input name="vacancy[]" type="checkbox" class="ace" value="Campus/Carrer Center" />
																		<span class="lbl"> Campus/Carrer Center</span>
																		</label>
																	</td>
																	<td>
																		<label>
																		<input name="vacancy[]" type="checkbox" class="ace" value="Newspaper" />
																		<span class="lbl"> Newspaper</span>
																		</label>
																	</td>
																	<td>
																		<label>
																		<input name="vacancy[]" type="checkbox" class="ace" value="Campus reqruitment" />
																		<span class="lbl"> Campus reqruitment</span>
																		</label>
																	</td>
																	</tr>
																	<tr>
																	<td>
																		<label>
																		<input name="vacancy[]" type="checkbox" class="ace" value="Jobsearch Website" />
																		<span class="lbl"> Jobsearch Website</span>
																		</label>
																	</td>
																	<td>
																		<label>
																		<input name="vacancy[]" type="checkbox" class="ace" value="Social Media" />
																		<span class="lbl"> Social Media</span>
																		</label>
																	</td>
																	</tr>
																	<tr>
																	<td>
																		<label>
																		<input name="vacancy[]" type="checkbox" id="medion_employee" class="ace" value="Medion Employees" />
																		<span class="lbl"> Medion Employees</span>
																		</label>
																	</td>
																	<td>
																		<label>
																		<input name="vacancy[]" type="checkbox" class="ace" value="Events (ex. Plant Tour, Stadium Generale, etc)" />
																		<span class="lbl"> Events</span>
																		<span class="help-button" data-rel="popover" data-trigger="hover" data-placement="left" data-content="(ex. Plant Tour, Stadium Generale, etc)" title="Event.">?</span>
																		</label>
																	</td>
																	</tr>
																	</table>
																	</div>
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
															</div>
													</div>
											</div>
										</div><!-- /.widget-main -->
									</div><!-- /.widget-body -->
								</div>
							</div><!-- /.col -->
							<!--================================================ General Data ========================================= -->

							<!--================================================ Personal Data ========================================= -->
							<div class="col-xs-12">
								<div class="widget-box widget-color-orange">
									<div class="widget-header widget-header-blue">
										<h4 class="widget-title lighter">Personal Data</h4>
									</div>
									<div class="widget-body">
										<div class="widget-main">
											<div id="fuelux-wizard-container">
													<div class="step-pane active" data-step="1">
															<div class="form-group">
																<label class="col-xs-12 col-sm-3 control-label no-padding-right">Full Name</label>

																<div class="col-xs-12 col-sm-5">
																	<span class="block input-icon input-icon-right">
																		<input type="text" name="full_name" class="width-100" />
																		<i class="ace-icon fa fa-pencil-square-o"></i>
																	</span>
																</div>
															</div>
															<div class="form-group">
																<label class="col-xs-12 col-sm-3 control-label no-padding-right">Gender</label>
																<div class="col-xs-12 col-sm-5">
																<div class="btn-group" data-toggle="buttons">
  																	<label class="btn btn-white">
    																	<input type="radio" name="male" id="option1" autocomplete="off" checked> Male
    																</label>
  																	<label class="btn btn-white">
    																	<input type="radio" name="female" id="option2" autocomplete="off"> Female
  																	</label>
																</div>
																</div>
															</div>
															<div class="form-group">
																<label class="col-xs-12 col-sm-3 control-label no-padding-right">Marital Status</label>
																<div class="col-xs-12 col-sm-5">
																	<div class="btn-group" data-toggle="buttons">
  																		<label class="btn btn-white">
    																		<input type="radio" name="marital_status" id="option1" autocomplete="off" checked> Single
    																	</label>
  																		<label class="btn btn-white">
    																		<input type="radio" name="marital_status" id="option2" autocomplete="off"> Married
  																		</label>
  																		<label class="btn btn-white">
    																		<input type="radio" name="marital_status" id="option2" autocomplete="off"> Widow
  																		</label>
																	</div>
																</div>
															</div>
															<div class="form-group">
																<label class="col-xs-12 col-sm-3 control-label no-padding-right">Date of Birth</label>
																<div class="col-xs-12 col-sm-1">
																	<?php
																		// set start and end year range
																		$dateArray = range(1, 31);
																	?>
																		<!-- displaying the dropdown list -->
																	<select name="date_of_birth" class="form-control">
    																<?php
    																	foreach ($dateArray as $date) {
        																	// if you want to select a particular year
        																	$selected = ($date == 1) ? 'selected' : '';
        																	echo '<option '.$selected.' value="'.$date.'">'.$date.'</option>';
    																	}
    																?>
																	</select>
																</div>
																<div class="col-xs-12 col-sm-2">
																	<select name='month_of_birth' class="form-control">
    																<?php
        																$months = array(1=>'January','February','March','April','May','June','July ','August','September','October','November','December');

        																foreach ($months as $num => $name) {
        																	printf('<option value="%s">%s</option>', $num, $name);
        																	}
        															?>
        															</select>
																</div>
																<div class="col-xs-12 col-sm-2">
																	<?php
																		// set start and end year range
																		$cur_year = date("Y");
																		$yearArray = range(1985, $cur_year);
																	?>
																		<!-- displaying the dropdown list -->
																	<select name="year_of_birth" class="form-control">
    																<?php
    																	foreach ($yearArray as $year) {
        																	// if you want to select a particular year
        																	$selected = ($year == $cur_year) ? 'selected' : '';
        																	echo '<option '.$selected.' value="'.$year.'">'.$year.'</option>';
    																	}
    																?>
																	</select>
																</div>
															</div>

															<div class="form-group">
																<label class="col-xs-12 col-sm-3 control-label no-padding-right">Mobile Phone</label>

																<div class="col-xs-12 col-sm-5">
																	<span class="block input-icon input-icon-right">
																		<input type="text" name="mobile_phone" class="width-100" placeholder="ex. 081223344556" />
																		<i class="ace-icon fa fa-mobile"></i>
																	</span>
																</div>
															</div>
															<div class="form-group">
															<label class="col-xs-12 col-sm-3 control-label no-padding-right"></label>
															<div class="col-sm-4">
																	<div class="widget-box">
																		<div class="widget-header">
																			<h4 class="widget-title">Photo</h4>
																		</div>
																		<div class="widget-body">
																			<div class="widget-main">
																				<div class="form-group">
																					<div class="col-xs-12">
																						<input type="file" name="photo" id="id-input-file-3" accept=".png, .jpg, .jpeg"/>
																					</div>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
													</div>
											</div>
										</div><!-- /.widget-main -->
									</div><!-- /.widget-body -->
								</div>
							</div><!-- /.col -->
							<!--================================================ Personal Data ========================================= -->

							<!--======================================= Educational Background ========================================= -->
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
  																		<label class="btn btn-white">
    																		<input type="radio" name="education_level" id="option1" autocomplete="off" value="D3"> D3
    																	</label>
  																		<label class="btn btn-white">
    																		<input type="radio" name="education_level" id="option2" autocomplete="off" value="D4"> D4
  																		</label>
  																		<label class="btn btn-white">
    																		<input type="radio" name="education_level" id="option2" autocomplete="off" value="S1"> S1
  																		</label>
  																		<label class="btn btn-white">
    																		<input type="radio" name="education_level" id="option2" autocomplete="off" value="Profession"> Profession
  																		</label>
  																		<label class="btn btn-white">
    																		<input type="radio" name="education_level" id="option2" autocomplete="off" value="S2"> S2
  																		</label>
																	</div>
																</div>
															</div>

															<div class="form-group">
																<label class="col-xs-12 col-sm-3 control-label no-padding-right">Institution Name</label>

																<div class="col-xs-12 col-sm-5">
																	<select name="institusi" class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose ...">
																	<option></option>
																	@foreach($institusi as $value)
																	<option value="{{$value->nama_institusi}}">{{$value->nama_institusi}}</option>
																	@endforeach
																	<option>Other...</option>
																	</select>
																</div>
															</div>
															<div class="form-group">
																<label class="col-xs-12 col-sm-3 control-label no-padding-right">Major Group</label>

																<div class="col-xs-12 col-sm-5">
																	<select name="major_group" class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose ...">
																		<option></option>
																		@foreach($major as $value)
																		<optgroup label="{{$value->major_grup->nama_grup}}">
																		<option value="{{$value->major}}">{{$value->major}}</option></optgroup>
																		@endforeach
																		<option value="Other">Other...</option>
																	</select>
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
																	<?php
																		// set start and end year range
																		$cur_year = date("Y");
																		$yearArray = range(1985, $cur_year);
																	?>
																		<!-- displaying the dropdown list -->
																	<select name="in_start_year" class="form-control">
    																<?php
    																	foreach ($yearArray as $year) {
        																	// if you want to select a particular year
        																	$selected = ($year == $cur_year) ? 'selected' : '';
        																	echo '<option '.$selected.' value="'.$year.'">'.$year.'</option>';
    																	}
    																?>
																	</select>
																</div>

																<label class="col-xs-12 col-sm-1 control-label no-padding-right">End Year</label>
																<div class="col-xs-12 col-sm-2">
																	<?php
																		// set start and end year range
																		$cur_year = date("Y");
																		$yearArray = range(1985, $cur_year);
																	?>
																		<!-- displaying the dropdown list -->
																	<select name="in_end_year" class="form-control">
    																<?php
    																	foreach ($yearArray as $year) {
        																	// if you want to select a particular year
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
							<!--======================================= Educational Background ========================================= -->

							<!--============================================ Work Experience =========================================== -->
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
																	<select name="line_of_business" class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose ...">
																		<option></option>
																		@foreach($bidang_usaha as $value)
																		<option value="{{$value->bidang_usaha}}">{{$value->bidang_usaha}}</option>
																		@endforeach
																		<option value="Other">Other..</option>
																	</select>
																</div>
															</div>
															<div class="form-group">
																<label class="col-xs-12 col-sm-3 control-label no-padding-right">Start Year</label>
																<div class="col-xs-12 col-sm-2">
																	<select name='lb_start_month' class="form-control">
    																<?php
        																$months = array(1=>'January','February','March','April','May','June','July ','August','September','October','November','December');

        																foreach ($months as $num => $name) {
        																	printf('<option value="%s">%s</option>', $num, $name);
        																	}
        															?>
        															</select>
																</div>
																<div class="col-xs-12 col-sm-2">
																	<?php
																		// set start and end year range
																		$cur_year = date("Y");
																		$yearArray = range(1985, $cur_year);
																	?>
																		<!-- displaying the dropdown list -->
																	<select name="lb_start_year" class="form-control">
    																<?php
    																	foreach ($yearArray as $year) {
        																	// if you want to select a particular year
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
    																<?php
        																$months = array(1=>'January','February','March','April','May','June','July ','August','September','October','November','December');

        																foreach ($months as $num => $name) {
        																	printf('<option value="%s">%s</option>', $num, $name);
        																	}
        															?>
        															</select>
																</div>
																<div class="col-xs-12 col-sm-2">
																	<?php
																		// set start and end year range
																		$cur_year = date("Y");
																		$yearArray = range(1985, $cur_year);
																	?>
																		<!-- displaying the dropdown list -->
																	<select name="lb_end_year" class="form-control">
    																<?php
    																	foreach ($yearArray as $year) {
        																	// if you want to select a particular year
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
							<!--============================================ Work Experience =========================================== -->

							<!--============================================ Psychotest Readiness ====================================== -->
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

																<div class="col-xs-12 col-sm-3">
																	<div class="input-group">
																	<input name="psychotest_date" class="form-control date-picker" id="id-date-picker-1" type="text" data-date-format="yyyy-mm-dd" />
																	<span class="input-group-addon">
																		<i class="fa fa-calendar bigger-110"></i>
																	</span>
																</div>
																</div>
															</div>
															<div class="form-group">
																<label class="col-xs-12 col-sm-3 control-label no-padding-right">City</label>

																<div class="col-xs-12 col-sm-5">
																	<select name="psychotest_city" class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose ...">
																		<option></option>
																		@foreach($kota as $value)
																		<option value="{{$value->kota}}">{{$value->kota}}</option>
																		@endforeach
																		<option value="Other">Other...</option>
																	</select>
																</div>
															</div>
													</div>
											</div>
										</div><!-- /.widget-main -->
									</div><!-- /.widget-body -->
								</div>
							</div><!-- /.col -->
							<!--============================================ Psychotest Readiness ====================================== -->

							<!--================================================ Confirmation ========================================== -->
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
    																		<input type="radio" name="confirm_oractical" id="option1" autocomplete="off" value="Yes"> Yes
    																	</label>
  																		<label class="btn btn-white">
    																		<input type="radio" name="confirm_oractical" id="option2" autocomplete="off" value="No"> No
  																		</label>
																	</div>
																</div>
															</div>
															<div class="form-group">
																<label class="col-xs-12 col-sm-5 control-label no-padding-right">Have you ever followed the psychotest in our company?</label>
																<div class="col-xs-12 col-sm-7">
																	<div class="btn-group" data-toggle="buttons">
  																		<label class="btn btn-white">
    																		<input type="radio" name="confirm_followed_psychotest" id="confirm_followed_yes" autocomplete="off" value="Yes"> Yes
    																	</label>
  																		<label class="btn btn-white">
    																		<input type="radio" name="confirm_followed_psychotest" id="confirm_followed_no" autocomplete="off" value="No"> No
  																		</label>
  																	<div class="col-xs-12 col-sm-7" id="confirm_followed_date" hidden>
																	<div class="input-group">
																	<input name="confirm_followed_psychotest_date" class="form-control date-picker" id="id-date-picker-1" type="text" data-date-format="yyyy-mm-dd" placeholder="Date" />
																	<span class="input-group-addon">
																		<i class="fa fa-calendar bigger-110"></i>
																	</span>
																	</div>
																	</div>
																	</div>
																</div>
															</div>
															<div class="form-group">
																<label class="col-xs-12 col-sm-5 control-label no-padding-right">Have you fill in in this application from correctly?</label>
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
															<button type="reset" class="btn btn-white btn-default btn-round"><i class="ace-icon fa fa-times red2"></i>Cancel</button>
															</div>
															</div>
													</div>
												</div>
											</div><!-- /.widget-main -->
										</div><!-- /.widget-body -->
									</div>
								</div><!-- /.col -->
							<!--================================================ Confirmation ========================================== -->

							</div><!-- /.row -->
						</form>
					</div><!-- /.page-content -->
			</div><!-- /.main-content -->
			</div>
			<br>
				<div class="footer-inner" align="center">
							<span class="blue bolder">PT MEDION</span>
							&copy; 2016
				</div>
			<br>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		<script src="assets/js/jquery-2.1.4.min.js"></script>

		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/jquery-ui.custom.min.js"></script>
		<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="assets/js/chosen.jquery.min.js"></script>
		<script src="assets/js/bootstrap-datepicker.min.js"></script>
		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

		<script type="text/javascript">
			jQuery(function($) {

				if(!ace.vars['touch']) {
					$('.chosen-select').chosen({allow_single_deselect:true});
					//resize the chosen on window resize

					$(window)
					.off('resize.chosen')
					.on('resize.chosen', function() {
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': $this.parent().width()});
						})
					}).trigger('resize.chosen');
					//resize chosen on sidebar collapse/expand
					$(document).on('settings.ace.chosen', function(e, event_name, event_val) {
						if(event_name != 'sidebar_collapsed') return;
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': $this.parent().width()});
						})
					});


					$('#chosen-multiple-style .btn').on('click', function(e){
						var target = $(this).find('input[type=radio]');
						var which = parseInt(target.val());
						if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
						 else $('#form-field-select-4').removeClass('tag-input-style');
					});
				}

				$('#id-input-file-3').ace_file_input({
					style: 'well',
					btn_choose: 'Drop images here or click to choose Photo',
					btn_change: null,
					no_icon: 'ace-icon fa fa-cloud-upload',
					droppable: true,
					thumbnail: 'fit',
					allowMime: ["image/jpg", "image/jpeg", "image/png", "image/gif", "image/bmp"],
					preview_error : function(filename, error_code) {
						//name of the file that failed
						//error_code values
						//1 = 'FILE_LOAD_FAILED',
						//2 = 'IMAGE_LOAD_FAILED',
						//3 = 'THUMBNAIL_FAILED'
						//alert(error_code);
					}

				}).on('change', function(){
					//console.log($(this).data('ace_input_files'));
					//console.log($(this).data('ace_input_method'));
				});
				$('[data-rel=tooltip]').tooltip({container:'body'});
				$('[data-rel=popover]').popover({container:'body'});
				//dynamically change allowed formats by changing allowExt && allowMime function
				$('.date-picker').datepicker({
					autoclose: true,
					todayHighlight: true
				})
				//show datepicker when clicking on the icon
				.next().on(ace.click_event, function(){
					$(this).prev().focus();
				});

			});
		</script>
		<script type="text/javascript">
		$('#medion_employee').change(function(){
			$("#medion_employee_name").prop("hidden", !$(this).is(':checked'));
		});
		$('#confirm_yes').change(function(){
			$("#simpan_lamaran").prop("disabled", !$(this).is(':checked'));
		});
		$('#confirm_no').change(function(){
			$("#simpan_lamaran").attr("disabled","disabled", !$(this).is(':checked'));
		});
		$('#confirm_followed_yes').change(function(){
			$("#confirm_followed_date").prop("hidden", !$(this).is(':checked'));
		});
		$('#confirm_followed_no').change(function(){
			$("#confirm_followed_date").attr("hidden","hidden", !$(this).is(':checked'));
		});
		$('#confirm_correctly').buttonset();
		function validAngka(a)
		{
  			if(!/^[0-9.]+$/.test(a.value))
  			{
  				a.value = a.value.substring(0,a.value.length-1);
  			}
		}
		</script>
	</body>
</html>
