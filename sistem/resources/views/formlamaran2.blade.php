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
						<!--================================================ Event Code ========================================= -->
							<div class="col-xs-12">
								<div class="widget-box widget-color-orange">
									<div class="widget-header widget-header-blue">
										<h4 class="widget-title lighter">Event Code</h4>
									</div>
									<div class="widget-body">
										<div class="widget-main">
											<div id="fuelux-wizard-container">
													<div class="step-pane active" data-step="1">
															<div class="form-group">
																<label class="col-xs-12 col-sm-3 control-label no-padding-right">Event Code</label>

																<div class="col-xs-12 col-sm-5">
																	<span class="block input-icon input-icon-right">
																		<input type="text" name="event_code" class="width-100" maxlength="3" oninput="validAngka(this)" />
																		<i class="ace-icon fa fa-pencil-square-o"></i>
																	</span>
																</div>
															</div>
													</div>
											</div>
										</div><!-- /.widget-main -->
									</div><!-- /.widget-body -->
								</div>
							</div><!-- /.col -->
						<!--================================================ Event Code ========================================= -->

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
																<label class="col-xs-12 col-sm-3 control-label no-padding-right">Where did you fine this vacancy?</label>

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
													<div class="step-pane active">
															<div class="form-group">
															<table width="100%">
															<tr>
															<td width="25%">
																<label class="col-xs-12 col-sm-12 control-label no-padding-right">Full Name</label>
															</td>
															<td width="50%">

																<div class="col-xs-12 col-sm-12">
																	<span class="block input-icon input-icon-right">
																		<input type="text" name="full_name" class="width-100" />
																		<i class="ace-icon fa fa-pencil-square-o"></i>
																	</span>
																</div>
															</td>
															<td rowspan="5" width="25%">
																<div class="col-sm-12">
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
															</td>
															</tr>
															</div>
															<div class="form-group">
															<tr>
															<td>
																<label class="col-xs-7 col-sm-12 control-label no-padding-right">Gender</label>
															</td>
															<td>
																<div class="col-xs-7 col-sm-12">
																<div class="btn-group" data-toggle="buttons">
  																	<label class="btn btn-white">
    																	<input type="radio" name="male" id="option1" autocomplete="off" checked> Male
    																</label>
  																	<label class="btn btn-white">
    																	<input type="radio" name="female" id="option2" autocomplete="off"> Female
  																	</label>
																</div>
																</div>
															</td>
															</tr>
															</div>
															<div class="form-group">
															<tr>
															<td>
																<label class="col-xs-12 col-sm-12 control-label no-padding-right">Marital Status</label>
															</td>
															<td>
																<div class="col-xs-12 col-sm-12">
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
															</td>
															</tr>
															</div>
															<div class="form-group">
															<tr>
															<td>
																<label class="col-xs-12 col-sm-12 control-label no-padding-right">Date of Birth</label>
															</td>
															<td>
																<div class="col-xs-12 col-sm-2">
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
																<div class="col-xs-12 col-sm-4">
																	<select name='month_of_birth' class="form-control">
    																<?php
        																$months = array(1=>'January','February','March','April','May','June','July ','August','September','October','November','December');

        																foreach ($months as $num => $name) {
        																	printf('<option value="%s">%s</option>', $num, $name);
        																	}
        															?>
        															</select>
																</div>
																<div class="col-xs-12 col-sm-3">
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
															</td>
															</tr>
															</div>

															<div class="form-group">
															<tr>
															<td>
																<label class="col-xs-12 col-sm-12 control-label no-padding-right">Mobile Phone</label>
															</td>
															<td>
																<div class="col-xs-12 col-sm-12">
																	<span class="block input-icon input-icon-right">
																		<input type="text" name="mobile_phone" class="width-100" placeholder="ex. 081223344556" />
																		<i class="ace-icon fa fa-mobile"></i>
																	</span>
																</div>
															</td>
															</tr>
															</table>
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
																	<select name="major_group" class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose ...">
																	<option></option>
															<option>Akademi Akuntansi YAI</option>
																	<option>Akademi Akuntansi YKPN, Yogyakarta</option>
																	<option>Akademi Angkatan Laut Surabaya, Surabaya</option>
																	<option>Akademi Informatika dan Komputer (AMIK) Medicom, Medan</option>
																	<option>Akademi Manajemen Informatika dan Komputer (AMIK) Jayanusa Padang</option>
																	<option>Akademi Manajemen Informatika dan Komputer (AMIK) MDP, Palembang</option>
																	<option>Akademi Manajemen Informatika dan Komputer (AMIK) Raharja Informatika, Tangerang</option>
																	<option>Akademi Manajemen Informatika dan Komputer (AMIK) Teknokrat Bandar Lampung</option>
																	<option>Akademi Manajemen Informatika dan Komputer Aster Yogyakarta</option>
																	<option>Akademi Manajemen Informatika dan Komputer Bina Sarana Informatika (BSI) Bekasi</option>
																	<option>Akademi Manajemen Informatika dan Komputer Bina Sarana Informatika (BSI) Jakarta</option>
																	<option>Akademi Manajemen Informatika dan Komputer BSI Bogor, Bogor</option>
																	<option>Akademi Manajemen Informatika dan Komputer Mataram, Mataram</option>
																	<option>Akademi Manajemen Informatika dan Komputer Wahana Mandiri Banten</option>
																	<option>Akademi Manajemen Kesatuan Bogor</option>
																	<option>Akademi Manajemen Perusahaan Jayabaya, Jakarta</option>
																	<option>Akademi Militer Magelang, Magelang</option>
																	<option>Akademi Pariwisata "ARS" Internasional Bandung</option>
																	<option>Akademi Pariwisata Makassar, Makassar</option>
																	<option>Akademi Pariwisata Medan, Medan</option>
																	<option>Akademi Pimpinan Perusahaan, Jakarta</option>
																	<option>Akademi Sekretari dan Manajemen Bina Sarana Informatika (BSI), Jakarta</option>
																	<option>Akademi Sekretari Dan Manajemen BSI Bandung, Bandung</option>
																	<option>Akademi Sekretari dan Manajemen Indonesia Solo</option>
																	<option>Akademi Sekretari dan Manajemen Marsudirini (ASMI) Santa Maria Yogyakarta</option>
																	<option>Akademi Sekretari dan Manajemen Mataram, Mataram</option>
																	<option>Akademi Sekretari Manajemen Bina Insani, Bekasi</option>
																	<option>Akademi Teknologi Industri Padang</option>
																	<option>Akademi Teknologi Warga Surakarta</option>
																	<option>Insittut Teknologi Del</option>
																	<option>Institut Agama Islam Negeri (IAIN) Imam Bonjol, Padang</option>
																	<option>Institut Agama Islam Negeri (IAIN) Sumatera Utara, Medan</option>
																	<option>Institut Bisnis dan Informatika Kwik Kian Gie, Jakarta</option>
																	<option>Institut Keguruan dan Ilmu Pendidikan Veteran Jawa Tengah, Semarang</option>
																	<option>Institut Keuangan Perbankan dan Informatika Asia Perbanas, Jakarta</option>
																	<option>Institut Pertanian Bogor</option>
																	<option>Institut Sains dan Teknologi AKPRIND, Yogyakarta</option>
																	<option>Institut Sains dan Teknologi Al-Kamal, Jakarta</option>
																	<option>Institut Teknologi Adhi Tama Surabaya (ITATS), Surabaya</option>
																	<option>Institut Teknologi Bandung (ITB)</option>
																	<option>Institut Teknologi Harapan Bangsa, Bandung</option>
																	<option>Institut Teknologi Indonesia (ITI), Jakarta</option>
																	<option>Institut Teknologi Indonesia, Tangerang</option>
																	<option>Institut Teknologi Medan (ITM)</option>
																	<option>Institut Teknologi Nasional (ITENAS) Bandung</option>
																	<option>Institut Teknologi Nasional Malang, Malang</option>
																	<option>Institut Teknologi Padang, Padang</option>
																	<option>Institut Teknologi Sepuluh Nopember (ITS), Surabaya</option>
																	<option>Institut Teknologi Telkom, Bandung</option>
																	<option>Politeknik ATMI Surakarta, Surakarta</option>
																	<option>Politeknik Balikpapan, Balikpapan</option>
																	<option>Politeknik Batam</option>
																	<option>Politeknik Bengkalis, Bengkalis</option>
																	<option>Politeknik Caltex, Pekanbaru</option>
																	<option>Politeknik Elektronika Negeri Surabaya, Surabaya</option>
																	<option>Politeknik Komputer Niaga LPKIA Bandung</option>
																	<option>Politeknik Manufaktur Astra, Jakarta</option>
																	<option>Politeknik Manufaktur Negeri Bangka Belitung, Sungailiat</option>
																	<option>Politeknik Negeri Ambon, Ambon</option>
																	<option>Politeknik Negeri Bali</option>
																	<option>Politeknik Negeri Bandung, Bandung</option>
																	<option>Politeknik Negeri Banjarmasin, Banjarmasin</option>
																	<option>Politeknik Negeri Jakarta, Depok</option>
																	<option>Politeknik Negeri Jakarta, Jakarta</option>
																	<option>Politeknik Negeri Jember, Jember</option>
																	<option>Politeknik Negeri Kupang</option>
																	<option>Politeknik Negeri Lhokseumawe, Lhokseumawe</option>
																	<option>Politeknik Negeri Malang, Malang</option>
																	<option>Politeknik Negeri Manado, Manado</option>
																	<option>Politeknik Negeri Medan</option>
																	<option>Politeknik Negeri Padang</option>
																	<option>Politeknik Negeri Pontianak, Pontianak</option>
																	<option>Politeknik Negeri Samarinda, Samarinda</option>
																	<option>Politeknik Negeri Semarang, Semarang</option>
																	<option>Politeknik Negeri Sriwijaya, Palembang</option>
																	<option>Politeknik Pertanian Negeri Kupang, Kupang</option>
																	<option>Politeknik Piksi Ganesha Bandung</option>
																	<option>Politeknik Pos Indonesia, Bandung</option>
																	<option>Politeknik Pratama Mulia, Surakarta</option>
																	<option>Politeknik Raflesia, Curup</option>
																	<option>Politeknik Sakti Surabaya, Surabaya</option>
																	<option>Politeknik Telkom, Bandung</option>
																	<option>Politeknik Ubaya, Surabaya</option>
																	<option>Sekolah Tinggi Agama Islam Negeri (STAIN) Purwokerto</option>
																	<option>Sekolah Tinggi Elektronika dan Komputer (STEKOM) PAT, Semarang</option>
																	<option>Sekolah Tinggi Energi dan Mineral AKAMIGAS, Cepu</option>
																	<option>Sekolah Tinggi Farmasi Bandung, Bandung</option>
																	<option>Sekolah Tinggi Farmasi Indonesia</option>
																	<option>Sekolah Tinggi Farmasi Indonesia Perintis Padang</option>
																	<option>Sekolah Tinggi Ilmu Administrasi dan Sekretari (STAds) ASMI</option>
																	<option>Sekolah Tinggi Ilmu Ekonomi - STEMBI Bandung</option>
																	<option>Sekolah Tinggi Ilmu Ekonomi (STIE) Sultan Agung Pematang Siantar</option>
																	<option>Sekolah Tinggi Ilmu Ekonomi AMM, Mataram</option>
																	<option>Sekolah Tinggi Ilmu Ekonomi Bhakti Pembangunan, Jakarta</option>
																	<option>Sekolah Tinggi Ilmu Ekonomi Dharma Andalas, Padang</option>
																	<option>Sekolah Tinggi Ilmu Ekonomi Dharma Putra Semarang</option>
																	<option>Sekolah Tinggi Ilmu Ekonomi Indonesia (STIESIA), Surabaya</option>
																	<option>Sekolah Tinggi Ilmu Ekonomi Indonesia Jakarta, Jakarta</option>
																	<option>Sekolah Tinggi Ilmu Ekonomi Kesatuan, Bogor</option>
																	<option>Sekolah Tinggi Ilmu Ekonomi Malangkucecwara, Malang</option>
																	<option>Sekolah Tinggi Ilmu Ekonomi Mandala, Jember</option>
																	<option>Sekolah Tinggi Ilmu Ekonomi Perbanas Surabaya</option>
																	<option>Sekolah Tinggi Ilmu Ekonomi Swadaya, Jakarta</option>
																	<option>Sekolah Tinggi Ilmu Ekonomi Trisakti</option>
																	<option>Sekolah Tinggi Ilmu Ekonomi YAI</option>
																	<option>Sekolah Tinggi Ilmu Ekonomi YKPN, Yogyakarta</option>
																	<option>Sekolah Tinggi Ilmu Farmasi (STIFAR) Yayasan Pharmasi Semarang</option>
																	<option>Sekolah Tinggi Ilmu Kesehatan Mohammad Husni Thamrin, Jakarta </option>
																	<option>Sekolah Tinggi Ilmu Komputer Poltek Cirebon</option>
																	<option>Sekolah Tinggi Ilmu Manajemen YKPN, Yogyakarta</option>
																	<option>Sekolah Tinggi Informatika dan Komputer Indonesia (STIKI), Malang</option>
																	<option>Sekolah Tinggi Manajemen dan Ilmu Komputer Bani Saleh Bekasi</option>
																	<option>Sekolah Tinggi Manajemen dan Ilmu Komputer Darmajaya Bandar Lampung</option>
																	<option>Sekolah Tinggi Manajemen dan Ilmu Komputer LIKMI</option>
																	<option>Sekolah Tinggi Manajemen dan Ilmu Komputer Mikroskil, Medan</option>
																	<option>Sekolah Tinggi Manajemen Infomatika dan Teknik Komputer (STIKOM) Surabaya</option>
																	<option>Sekolah Tinggi Manajemen Informatika dan Komputer (STIKOM) Bali, Denpasar </option>
																	<option>Sekolah Tinggi Manajemen Informatika dan Komputer (STMIK) AMIKOM, Sleman - Yogyakarta</option>
																	<option>Sekolah Tinggi Manajemen Informatika dan Komputer (STMIK) Jakarta (STI&K)</option>
																	<option>Sekolah Tinggi Manajemen Informatika dan Komputer (STMIK) Jayabaya, Jakarta</option>
																	<option>Sekolah Tinggi Manajemen Informatika dan Komputer (STMIK) Potensi Utama, Medan</option>
																	<option>Sekolah Tinggi Manajemen Informatika dan Komputer (STMIK) Sumedang</option>
																	<option>Sekolah Tinggi Manajemen Informatika dan Komputer AKAKOM Yogyakarta</option>
																	<option>Sekolah Tinggi Manajemen Informatika dan Komputer AMIK Bandung</option>
																	<option>Sekolah Tinggi Manajemen Informatika dan Komputer Bina Insani, Bekasi </option>
																	<option>Sekolah Tinggi Manajemen Informatika dan Komputer LIKMI, Bandung</option>
																	<option>Sekolah Tinggi Manajemen Informatika dan Komputer Triguna Dharma, Medan</option>
																	<option>Sekolah Tinggi Manajemen Informatika dan Teknik Komputer Surabaya, Surabaya</option>
																	<option>Sekolah Tinggi Manajemen Transpor (STMT) Trisakti, Jakarta</option>
																	<option>Sekolah Tinggi Pariwisata Bali</option>
																	<option>Sekolah Tinggi Pariwisata Bandung</option>
																	<option>Sekolah Tinggi Teknik PLN, Jakarta</option>
																	<option>Sekolah Tinggi Teknik Surabaya</option>
																	<option>Sekolah Tinggi Teknologi Adi Sutjipto</option>
																	<option>Sekolah Tinggi Teknologi Adisutjipto, Yogyakarta</option>
																	<option>Sekolah Tinggi Teknologi Garut, Garut</option>
																	<option>Sekolah Tinggi Teknologi Jakarta (STTJ)</option>
																	<option>Sekolah Tinggi Teknologi Kedirgantaraan, Bantul</option>
																	<option>Sekolah Tinggi Teknologi Mandala, Bandung</option>
																	<option>Sekolah Tinggi Teknologi Nasional, Yogyakarta</option>
																	<option>Sekolah Tinggi Teknologi TNI Angkatan Laut</option>
																	<option>Universitas 17 Agustus 1945 Jakarta, Jakarta</option>
																	<option>Universitas 17 Agustus 1945 Semarang, Semarang</option>
																	<option>Universitas 17 Agustus 1945 Surabaya, Surabaya</option>
																	<option>Universitas 45 Makassar</option>
																	<option>Universitas Achmad Dahlan</option>
																	<option>Universitas Ahmad Dahlan, Yogyakarta</option>
																	<option>Universitas Airlangga, Surabaya</option>
																	<option>Universitas Al Azhar Indonesia, Jakarta</option>
																	<option>Universitas Andalas (UNAND), Padang</option>
																	<option>Universitas Atma Jaya Yogyakarta, Yogyakarta</option>
																	<option>Universitas Bandar Lampung (UBL), Lampung</option>
																	<option>Universitas Batam, Batam</option>
																	<option>Universitas Bengkulu, Bengkulu</option>
																	<option>Universitas Bina Darma Palembang</option>
																	<option>Universitas Bina Nusantara, Jakarta</option>
																	<option>Universitas Brawijaya, Malang</option>
																	<option>Universitas Bung Hatta, Padang</option>
																	<option>Universitas Cenderawasih (UNCEN), Jayapura</option>
																	<option>Universitas Darma Agung, Medan</option>
																	<option>Universitas Dian Nuswantoro, Semarang</option>
																	<option>Universitas Diponegoro, Semarang</option>
																	<option>Universitas Ekasakti, Padang</option>
																	<option>Universitas Gadjah Mada, Yogyakarta</option>
																	<option>Universitas Gunadarma, Jakarta</option>
																	<option>Universitas Haluoleo, Kendari</option>
																	<option>Universitas Hasanuddin (UNHAS), Makassar</option>
																	<option>Universitas Ibn Khaldun Bogor</option>
																	<option>Universitas Indonesia, Jakarta</option>
																	<option>Universitas Indonusa Esa Unggul, Jakarta</option>
																	<option>Universitas Internasional Batam, Batam</option>
																	<option>Universitas Islam 45 Bekasi, Bekasi</option>
																	<option>Universitas Islam Bandung (UNISBA)</option>
																	<option>Universitas Islam Indonesia Yogyakarta, Yogyakarta</option>
																	<option>Universitas Islam Malang, Malang</option>
																	<option>Universitas Islam Negeri (UIN) Sultan Syarif Kasim, Pekanbaru</option>
																	<option>Universitas Islam Negeri (UIN) Syarif Hidayatullah, Jakarta</option>
																	<option>Universitas Islam Negeri Sunan Kalijaga Yogyakarta, Yogyakarta</option>
																	<option>Universitas Islam Sultan Agung, Semarang</option>
																	<option>Universitas Islam Sumatera Utara (UISU), Medan</option>
																	<option>Universitas Jambi, Jambi</option>
																	<option>Universitas Janabadra, Yogyakarta</option>
																	<option>Universitas Jayabaya, Jakarta</option>
																	<option>Universitas Jember, Jember</option>
																	<option>Universitas Jenderal Achmad Yani (UNJANI), Cimahi</option>
																	<option>Universitas Jenderal Soedirman (UNSOED), Purwokerto</option>
																	<option>Universitas Katolik Indonesia Atma Jaya, Jakarta</option>
																	<option>Universitas Katolik Parahyangan (UNPAR), Bandung</option>
																	<option>Universitas Katolik Soegijapranata, Semarang</option>
																	<option>Universitas Katolik Widya Mandala Surabaya, Surabaya</option>
																	<option>Universitas Komputer Indonesia (UNIKOM) Bandung</option>
																	<option>Universitas Komputer Indonesia, Bandung</option>
																	<option>Universitas Krisnadwipayana, Jakarta</option>
																	<option>Universitas Kristen Indonesia (UKI), Jakarta</option>
																	<option>Universitas Kristen Indonesia Paulus, Makassar</option>
																	<option>Universitas Kristen Maranatha, Bandung</option>
																	<option>Universitas Kristen Petra, Surabaya</option>
																	<option>Universitas Kristen Satya Wacana (UKSW), Salatiga</option>
																	<option>Universitas Lambung Mangkurat (UNLAM), Banjarmasin</option>
																	<option>Universitas Lampung (UNILA), Bandar Lampung</option>
																	<option>Universitas Langlang Buana, Bandung</option>
																	<option>Universitas Ma Chung, Malang</option>
																	<option>Universitas Mahasaraswati Denpasar, Denpasar</option>
																	<option>Universitas Malikussaleh, Aceh Utara</option>
																	<option>Universitas Mataram (UNRAM), Mataram</option>
																	<option>Universitas Medan Area, Medan</option>
																	<option>Universitas Mercu Buana, Jakarta</option>
																	<option>Universitas Merdeka Madiun, Madiun</option>
																	<option>Universitas Merdeka Malang, Malang</option>
																	<option>Universitas Mpu Tantular, Jakarta</option>
																	<option>Universitas Muhammadiyah Gresik, Gresik</option>
																	<option>Universitas Muhammadiyah Jakarta, Jakarta</option>
																	<option>Universitas Muhammadiyah Jember</option>
																	<option>Universitas Muhammadiyah Malang, Malang</option>
																	<option>Universitas Muhammadiyah Palembang, Palembang</option>
																	<option>Universitas Muhammadiyah Prof. Dr. Hamka, Jakarta</option>
																	<option>Universitas Muhammadiyah Sumatera Utara, Medan</option>
																	<option>Universitas Muhammadiyah Yogyakarta, Yogyakarta</option>
																	<option>Universitas Muria Kudus, Kudus</option>
																	<option>Universitas Muslim Indonesia, Makassar</option>
																	<option>Universitas Narotama, Surabaya</option>
																	<option>Universitas Nasional, Jakarta</option>
																	<option>Universitas Negeri Jakarta (UNJ), Jakarta</option>
																	<option>Universitas Negeri Malang, Malang</option>
																	<option>Universitas Negeri Manado</option>
																	<option>Universitas Negeri Medan</option>
																	<option>Universitas Negeri Padang, Padang</option>
																	<option>Universitas Negeri Papua</option>
																	<option>Universitas Negeri Semarang (UNNES), Semarang</option>
																	<option>Universitas Negeri Yogyakarta (UNY), Yogyakarta</option>
																	<option>Universitas Ngurah Rai, Denpasar</option>
																	<option>Universitas Nurtanio, Bandung</option>
																	<option>Universitas Nusa Cendana, Kupang</option>
																	<option>Universitas Padjadjaran, Bandung</option>
																	<option>Universitas Pakuan, Bogor</option>
																	<option>Universitas Pakuan, Bogor</option>
																	<option>Universitas Pancasakti, Tegal</option>
																	<option>Universitas Pancasila, Jakarta</option>
																	<option>Universitas Pasundan (UNPAS), Bandung</option>
																	<option>Universitas Pelita Harapan (UPH), Jakarta</option>
																	<option>Universitas Pembangunan Nasional Veteran (UPN) Jakarta</option>
																	<option>Universitas Pembangunan Nasional Veteran (UPN) Jawa Timur, Surabaya</option>
																	<option>Universitas Pembangunan Nasional Veteran (UPN) Yogyakarta</option>
																	<option>Universitas Pendidikan Indonesia (UPI), Bandung</option>
																	<option>Universitas Pendidikan Nasional (UNDIKNAS), Denpasar</option>
																	<option>Universitas Persada Indonesia YAI, Jakarta</option>
																	<option>Universitas Putra Indonesia YPTK Padang, Padang</option>
																	<option>Universitas Riau, Pekanbaru</option>
																	<option>Universitas Sahid, Jakarta</option>
																	<option>Universitas Sains dan Teknologi Jayapura (USTJ), Jayapura</option>
																	<option>Universitas Sam Ratulangi, Manado</option>
																	<option>Universitas Sanata Dharma, Yogyakarta</option>
																	<option>Universitas Sangga Buana YPKP, Bandung</option>
																	<option>Universitas Sarjanawiyata Tamansiswa, Yogyakarta</option>
																	<option>Universitas Satya Negara Indonesia, Jakarta</option>
																	<option>Universitas Sebelas Maret (UNS), Surakarta</option>
																	<option>Universitas Semarang, Semarang</option>
																	<option>Universitas Setia Budi Surakarta, Surakarta</option>
																	<option>Universitas Siliwangi, Tasikmalaya</option>
																	<option>Universitas Sriwijaya (UNSRI), Palembang</option>
																	<option>Universitas Sultan Ageng Tirtayasa, Serang</option>
																	<option>Universitas Sumatera Utara (USU), Medan</option>
																	<option>Universitas Surabaya (UBAYA), Surabaya</option>
																	<option>Universitas Syiah Kuala, Banda Aceh</option>
																	<option>Universitas Tadulako, Palu</option>
																	<option>Universitas Tanjungpura (UNTAN), Pontianak</option>
																	<option>Universitas Tarumanagara (UNTAR), Jakarta</option>
																	<option>Universitas Teknologi Yogyakarta</option>
																	<option>Universitas Tidar, Magelang</option>
																	<option>Universitas Trisakti, Jakarta</option>
																	<option>Universitas Trunojoyo, Bangkalan</option>
																	<option>Universitas Udayana (UNUD), Denpasar</option>
																	<option>Universitas Wahid Hasyim, Semarang</option>
																	<option>Universitas Warmadewa, Denpasar</option>
																	<option>Universitas Widya Gama, Malang</option>
																	<option>Universitas Widyatama, Bandung</option>
																	<option>Universitas Wijayakusuma, Purwokerto</option>
																	<option>Unviersitas Muhammadiyah Purwokerto, Purwokerto</option>
																	<option>Lain-lain</option>
													</select>
																</div>
															</div>
															<div class="form-group">
																<label class="col-xs-12 col-sm-3 control-label no-padding-right">Major Group</label>

																<div class="col-xs-12 col-sm-5">
																	<select name="major_group" class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose ...">
																		<option></option>
																		<optgroup label="APOTEKER">
																		<option>Apoteker</option>
																		<option>Farmasi</option>
																		</optgroup>
																		<optgroup label="BIOLOGI">
																		<option>Biokimia</option>
																		<option>Biologi</option>
																		<option>Mikrobiologi</option>
																		<option>Teknobiologi</option>
																		</optgroup>
																		<optgroup label="DESAIN">
																		<option>Desain Grafis</option>
																		<option>Desain Interior</option>
																		<option>Desain Komunikasi Visual</option>
																		<option>Desain Produk</option>
																		<option>Seni Rupa</option>
																		</optgroup>
																		<optgroup label="DOKTER HEWAN">
																		<option>Dokter Hewan</option>
																		</optgroup>
																		<optgroup label="EKONOMI">
																		<option>Administrasi Bisnis</option>
																		<option>Administrasi Negara</option>
																		<option>Administrasi Niaga</option>
																		<option>Akuntansi</option>
																		<option>Ilmu Ekonomi</option>
																		<option>Manajemen</option>
																		</optgroup>
																		<optgroup label="FISIKA">
																		<option>Fisika</option>
																		</optgroup>
																		<optgroup label="HUB. INTERNATIONAL">
																		<option>Hubungan Internasional</option>
																		<option>International Trade</option>
																		</optgroup>
																		<optgroup label="HUKUM">
																		<option>Ilmu Hukum</option>
																		</optgroup>
																		<optgroup label="KIMIA">
																		<option>Analis Kimia</option>
																		<option>Kimia</option>
																		</optgroup>
																		<optgroup label="KOMUNIKASI">
																		<option>Ilmu Komunikasi</option>
																		</optgroup>
																		<optgroup label="MATEMATIKA">
																		<option>Matematika</option>
																		</optgroup>
																		<optgroup label="PERIKANAN">
																		<option>Perikanan</option>
																		</optgroup>
																		<optgroup label="PERTANIAN">
																		<option>Pertanian</option>
																		<option>Teknik Hasil Hutan</option>
																		<option>Teknik Pangan</option>
																		<option>Teknik Pertanian</option>
																		</optgroup>
																		<optgroup label="PETERNAKAN">
																		<option>Peternakan</option>
																		</optgroup>
																		<optgroup label="PSIKOLOGI">
																		<option>Psikologi</option>
																		</optgroup>
																		<optgroup label="SASTRA">
																		<option>Bahasa Mandarin</option>
																		<option>Sastra Inggris</option>
																		</optgroup>
																		<optgroup label="TEKNIK ELEKTRO">
																		<option>Teknik Elektro</option>
																		<option>Teknik Listrik</option>
																		<option>Teknik Telekomunikasi</option>
																		</optgroup>
																		<optgroup label="TEKNIK INDUSTRI">
																		<option>Teknik Industri</option>
																		</optgroup>
																		<optgroup label="TEKNIK INFORMATIKA">
																		<option>Ilmu Komputer</option>
																		<option>Manajemen Informatika</option>
																		<option>Sistem Informasi</option>
																		<option>Teknik Informatika</option>
																		<option>Teknik Komputer</option>
																		</optgroup>
																		<optgroup label="TEKNIK KIMIA">
																		<option>Teknik Kimia</option>
																		</optgroup>
																		<optgroup label="TEKNIK LINGKUNGAN">
																		<option>Hiperkes</option>
																		<option>Kesehatan Lingkungan</option>
																		<option>Teknik Lingkungan</option>
																		</optgroup>
																		<optgroup label="TEKNIK MESIN">
																		<option>Teknik Konversi Energi</option>
																		<option>Teknik Manufaktur</option>
																		<option>Teknik Mekatronika</option>
																		<option>Teknik Mesin</option>
																		<option>Teknik Mesin Produksi</option>
																		<option>Teknik Otomotif</option>
																		<option>Teknik Pengecoran Logam</option>
																		<option>Teknik Refrigerasi & Tata Udara</option>
																		</optgroup>
																		<optgroup label="TEKNIK NUKLIR">
																		<option>Teknik Nuklir</option>
																		</optgroup>
																		<optgroup label="TEKNIK SIPIL">
																		<option>Arsitektur</option>
																		<option>Teknik Perencanaan Wilayah dan Tata Kota</option>
																		<option>Teknik Sipil</option>
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
																		<option value="">  </option>
																		<option value="Oil & Gas">Oil & Gas</option>
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
																		<option value="">  </option>
																		<option value="Bandung">Bandung</option>
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
