<?php
$title = Request::segment(1);
$title = str_replace("_", " ", $title);
$title = title_case($title);

if(Request::segment(1) == 'admin'){

	Breadcrumbs::register('admin', function($breadcrumbs){
    $breadcrumbs->push('Home', route('admin'));
	});

}else{

	Breadcrumbs::register('admin', function($breadcrumbs){
    $breadcrumbs->push('Home', route('admin'));
	});

	Breadcrumbs::register(Request::segment(1), function($breadcrumbs) use($title) {
    $breadcrumbs->parent('admin');
    $breadcrumbs->push($title, route(Request::segment(1)));
	});

}