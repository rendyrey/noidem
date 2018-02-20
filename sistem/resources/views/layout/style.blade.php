<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta charset="utf-8" />
	<title>From Lamaran - Medion</title>
	<meta name="description" content="overview &amp; stats" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
	<link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css') }}" />
	<link rel="stylesheet" href="{{ URL::asset('assets/font-awesome/4.5.0/css/font-awesome.min.css') }}" />
	<link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap-datepicker3.min.css') }}" />
	<link rel="stylesheet" href="{{ URL::asset('assets/css/fonts.googleapis.com.css') }}" />
	<link rel="stylesheet" href="{{ URL::asset('assets/css/ace.min.css') }}" class="ace-main-stylesheet" id="main-ace-style" />
	<link rel="stylesheet" href="{{ URL::asset('assets/css/ace-skins.min.css') }}" />
	<link rel="stylesheet" href="{{ URL::asset('assets/css/ace-rtl.min.css') }}" />
	<link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap-editable.min.css') }}" />
	<script src="{{ URL::asset('assets/js/ace-extra.min.js') }}"></script>
	<style type="text/css">
		.page-content {
		resize: vertical;
		overflow: auto;
		}
	</style>

</head>
<body class="no-skin">
		<div id="navbar" class="navbar navbar-default ace-save-state">
		<div class="navbar-container ace-save-state" id="navbar-container">
		<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
		<span class="sr-only">Toggle sidebar</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		</button>
		<div class="navbar-header pull-left">
		<a href="{{ url('admin') }}" class="navbar-brand">
		<small>
		<i class="fa fa-graduation-cap"></i>
		Form Lamaran
		</small>
		</a>
		</div>


		<div class="navbar-buttons navbar-header pull-right" role="navigation">
		<ul class="nav ace-nav">
		<li class="light-blue dropdown-modal">
		<a data-toggle="dropdown" href="#" class="dropdown-toggle">
		<img class="nav-user-photo" src="{{ URL::asset('assets/images/avatars/avatar5.png') }}" alt="user's Photo" />

		<span class="user-info">
		<small>Welcome,</small>
		{{ Auth::user()->name }}
		</span>
		<i class="ace-icon fa fa-caret-down"></i>
		</a>
		<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">


		<li>
		<a href="{{ url('/logout') }}">
		<i class="ace-icon fa fa-sign-out"></i>
		Logout
		</a>
		</li>
		</ul>
		</li>
		</ul>
		</div>
		</div>
		</div>
