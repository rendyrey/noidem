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
	<link rel="stylesheet" href="assets/css/bootstrap-editable.min.css" />
	<script src="assets/js/jquery-2.1.4.min.js"></script>
	<script src="assets/js/ace-extra.min.js"></script>
	{{-- <script src="assets/coding_js/validasi_1.js"></script>			 --}}

</head>
<style>
.container {max-width: 1000px;}
</style>
<style>

label[name=confirm_yes]:active {
	color: red;
}

</style>
<body background="assets/5.jpg">

	<div class="container">
		<div class="main-content">
			<div class="page-content">
				<img src="assets/banner.png" class="img-responsive">
				<div class="row">
					<div class="page-content">
						@if (Session::has('message'))
							<script>alert("{{ Session::get('message') }}");</script>
						@endif
						{{-- @if ($errors->any())
							<ul>
							@foreach ($errors->all() as $error)
								<li><font color="red">{{ $error }}</font></li>
							@endforeach
						</ul>
						@endif --}}
						<form class="form-horizontal" action="{{url('tambah_pelamar')}}" method="POST" enctype="multipart/form-data" id="form_lamaran" name="form_lamaran" onsubmit="return Validasi_simpan()">
							{!! csrf_field() !!}
