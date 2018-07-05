<?php

Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('login', function(){
	return view('auth.login_admin');
});

Route::get('import', function(){
	return view('admin.import.index');
});
Route::get('import_akreditasi', function(){
	return view('admin.import.akreditasi');
});

// Form Lamaran
Route::get('/', 'FormLamaranController@index');
Route::post('tambah_pelamar', 'FormLamaranController@tambah');


//Pelamar
Route::get('pelamar', 'PelamarController@tampil_pelamar');
Route::get('pelamar/{id}/detail', 'PelamarController@detail_pelamar');
Route::get('pelamar/{id}/edit', 'PelamarController@edit');
Route::get('pelamar/{id}/update', 'PelamarController@update');
Route::post('pelamar/filter/','PelamarController@filter');
Route::post('export_pelamar','PelamarController@export_pelamar');
Route::post('import_pelamar','PelamarController@import_pelamar');
Route::post('pelamar/edit_pelamar','PelamarController@edit_pelamar');
Route::get('pelamar/update_tabel/{status}','PelamarController@update_tabel');
Route::get('pelamar_inproses','PelamarController@pelamar_inproses');
//Pelamar Inproses
Route::get('pelamar_inproses/get_psychotest','PelamarController@get_psychotest');
Route::post('pelamar_inproses/tambah_schedule','PelamarController@tambah_schedule');
Route::post('pelamar_inproses/update_schedule','PelamarController@update_schedule');
Route::get('pelamar_inproses/details/{id}','PelamarController@details');
Route::get('pelamar_inproses/add_applicant/{id}','PelamarController@add_applicant');
Route::post('pelamar_inproses/add_applicants/{id}','PelamarController@add_applicants');
//pelamar awaiting
Route::get('pelamar_awaiting','PelamarController@pelamar_awaiting');

//pelamar failed
Route::get('pelamar_failed','PelamarController@pelamar_failed');
Route::get('/2', function () {
	return view('formlamaran2');
});
Route::post('pelamar_process_psychotest','PelamarController@pelamar_process_psychotest');

// Campus Reqruitment
Route::get('cr', 'CampusReqruitmentController@index');

// Job Fair
Route::get('jobfair_online', 'JobFairController@index');
Route::get('jobfair','JobFairController@index_online');
Route::post('tambah_pelamar_jobfair','JobFairController@tambah');
Route::post('open_form','JobFairController@open_form');

// Admin
Route::get('admin', 'DashboardController@vacancy_dashboard');

//Dashboard
Route::get('vacancy_dashboard', 'DashboardController@vacancy_dashboard');
Route::get('main_dashboard', 'DashboardController@main_dashboard');
Route::get('applicant_dashboard', 'DashboardController@applicant_dashboard');
Route::get('calendar_psychotest','DashboardController@calendar_psychotest');
Route::get('calendar_data','DashboardController@calendar_data');

//Bidang Usaha
Route::get('bidang_usaha', 'BidangUsahacontroller@index');
Route::post('tambah_bidang_usaha', 'BidangUsahacontroller@tambah');
Route::get('bidang_usaha/{id}/edit', 'BidangUsahacontroller@edit');
Route::get('bidang_usaha/{id}/update', 'BidangUsahacontroller@update');
Route::get('bidang_usaha/{id}/delete','BidangUsahaCOntroller@delete');
Route::post('bidang_usaha/modal_hapus','BidangUsahaController@modal_hapus');
Route::post('import_bidang_usaha','BidangUsahaController@import_bidang_usaha');
Route::get('export_bidang_usaha','BidangUsahaController@export_bidang_usaha');

//Institusi
Route::get('institusi', 'Institusicontroller@index');
Route::post('import_institusi', 'Institusicontroller@import');
Route::post('tambah_institusi', 'Institusicontroller@tambah');
Route::get('institusi/{id}/edit', 'Institusicontroller@edit');
Route::get('institusi/{id}/update', 'Institusicontroller@update');
Route::post('import_institusi','InstitusiController@import_institusi');
Route::get('export_institusi','InstitusiController@export_institusi');

//Provinsi
Route::get('provinsi', 'Provinsicontroller@index');
Route::post('tambah_provinsi', 'Provinsicontroller@tambah');
Route::get('provinsi/{id}/edit', 'Provinsicontroller@edit');
Route::get('provinsi/{id}/update', 'Provinsicontroller@update');
Route::get('export_provinsi','ProvinsiController@export_provinsi');
Route::post('import_provinsi','ProvinsiController@import_provinsi');

//Kota
Route::get('kota', 'Kotacontroller@index');
Route::post('tambah_kota', 'Kotacontroller@tambah');
Route::get('kota/{id}/edit', 'Kotacontroller@edit');
Route::get('kota/{id}/update', 'Kotacontroller@update');
Route::get('export_kota','KotaController@export_kota');
Route::post('import_kota','KotaController@import_kota');

//Major Grup
Route::get('major_grup', 'MajorGrupController@index');
Route::post('tambah_major_grup', 'MajorGrupController@tambah');
Route::get('major_grup/{id}/edit', 'MajorGrupController@edit');
Route::get('major_grup/{id}/update', 'MajorGrupController@update');
Route::get('export_major_grup','MajorGrupController@export_major_grup');
Route::post('import_major_grup','MajorGrupController@import_major_grup');

//major
Route::get('major', 'MajorController@index');
Route::post('tambah_major', 'MajorController@tambah');
Route::get('major/{id}/edit', 'MajorController@edit');
Route::get('major/{id}/update', 'MajorController@update');
Route::get('export_major','MajorController@export_major');
Route::post('import_major','MajorController@import_major');

//Posisi
Route::get('posisi','PosisiController@index');
Route::get('posisi/{id}/edit','PosisiController@edit');
Route::get('posisi/{id}/delete','PosisiController@delete');
Route::post('posisi/{id}/update','PosisiController@update');
Route::post('posisi/tambah','PosisiController@tambah');

//Position Publish
Route::get('position_publish','PositionPublishController@index');
Route::get('position_publish/{id}/edit','PositionPublishController@edit');
Route::post('position_publish/{id}/update','PositionPublishController@update');
Route::get('position_publish/{id}/delete','PositionPublishController@delete');
Route::post('position_publish/tambah/','PositionPublishController@tambah');

//Position Category
Route::get('position_category','PositionCategoryController@index');
Route::post('tambah_position_category','PositionCategoryController@tambah');
Route::get('position_category/{id}/delete','PositionCategoryController@delete');

//Advertising Category
Route::get('advertising_category', 'AdvertisingCategoryController@index');
Route::post('tambah_advertising_category', 'AdvertisingCategoryController@tambah');
Route::get('advertising_category/{id}/edit', 'AdvertisingCategoryController@edit');
Route::get('advertising_category/{id}/update', 'AdvertisingCategoryController@update');

//Advertising Media
Route::get('advertising_media', 'AdvertisingMediaController@index');
Route::post('tambah_advertising_media', 'AdvertisingMediaController@tambah');
Route::get('advertising_media/{id}/edit', 'AdvertisingMediaController@edit');
Route::get('advertising_media/{id}/update', 'AdvertisingMediaController@update');

//Event Vacancy
Route::get('event_vacancy', 'EventVacancyController@index');
Route::post('tambah_event_vacancy', 'EventVacancyController@tambah');
Route::get('event_vacancy/{id}/edit', 'EventVacancyController@edit');
Route::get('event_vacancy/{id}/update', 'EventVacancyController@update');

//Tingkat Pendidikan
Route::get('tingkat_pendidikan', 'TingkatPendidikanController@index');
Route::post('tambah_tingkat_pendidikan', 'TingkatPendidikanController@tambah');
Route::get('tingkat_pendidikan/{id}/edit', 'TingkatPendidikanController@edit');
Route::get('tingkat_pendidikan/{id}/update', 'TingkatPendidikanController@update');

//Tanggal Psychotest
Route::get('tanggal_psychotest', 'TanggalPsychotestController@index');
Route::post('tambah_tanggal_psychotest','TanggalPsychotestController@tambah');
Route::get('tanggal_psychotest/{id}/edit','TanggalPsychotestController@edit');
Route::get('tanggal_psychotest/{id}/update','TanggalPsychotestController@update');

//Kriteria Syarat
Route::get('kriteria_syarat','KriteriaSyaratController@index');
Route::get('kriteria_syarat/{id}/edit','KriteriaSyaratController@edit');
Route::get('kriteria_syarat/{id}/update','KriteriaSyaratController@update');
Route::get('kriteria_syarat/{id}/delete','KriteriaSyaratController@delete');

//Syarat Psychotest
Route::post('tambah_syarat_psychotest','KriteriaSyaratController@tambah_syarat_psychotest');
Route::post('tambah_syarat_psychotest_khusus','KriteriaSyaratController@tambah_syarat_psychotest_khusus');
Route::get('syarat_psychotest','KriteriaSyaratController@syarat_psychotest');
Route::get('syarat_psychotest/{id}/edit','KriteriaSyaratController@syarat_psychotest_edit');
Route::get('syarat_psychotest_khusus/{id}/edit','KriteriaSyaratController@syarat_psychotest_edit_khusus');
Route::get('syarat_psychotest/{id}/update','KriteriaSyaratController@syarat_psychotest_update');
Route::get('syarat_psychotest_khusus/{id}/update','KriteriaSyaratController@syarat_psychotest_update_khusus');
Route::get('syarat_psychotest/{id}/delete','KriteriaSyaratController@syarat_psychotest_delete');
Route::get('syarat_psychotest_khusus/{id}/delete','KriteriaSyaratController@syarat_psychotest_delete');

//Syarat Pre-Screening
Route::get('syarat_prescreening','KriteriaSyaratController@syarat_prescreening');
Route::post('tambah_syarat_prescreening','KriteriaSyaratController@tambah_syarat_prescreening');
Route::post('tambah_syarat_prescreening_khusus','KriteriaSyaratController@tambah_syarat_prescreening_khusus');
Route::get('syarat_prescreening/{id}/delete','KriteriaSyaratController@syarat_prescreening_delete');
Route::get('syarat_prescreening/{id}/edit','KriteriaSyaratController@syarat_prescreening_edit');
Route::get('syarat_prescreening_khusus/{id}/edit','KriteriaSyaratController@syarat_prescreening_edit_khusus');
Route::get('syarat_prescreening/{id}/update','KriteriaSyaratController@syarat_prescreening_update');
Route::get('syarat_prescreening_khusus/{id}/update','KriteriaSyaratController@syarat_prescreening_update_khusus');
//Vacancy Advertising
Route::get('vacancy_advertising', 'VacancyAdvertisingController@index');
Route::post('tambah_iklan', 'VacancyAdvertisingController@tambah_iklan');
Route::post('tambah/{id}/loker', 'VacancyAdvertisingController@tambah_loker');
Route::get('vacancy_advertising/{id}/edit_iklan', 'VacancyAdvertisingController@edit_iklan');
Route::get('vacancy_advertising/{id}/update_iklan', 'VacancyAdvertisingController@update_iklan');
Route::get('vacancy_advertising/{id}/edit_loker', 'VacancyAdvertisingController@edit_loker');
Route::get('vacancy_advertising/{id}/update_loker', 'VacancyAdvertisingController@update_loker');
Route::post('vacancy_advertising/filter','VacancyAdvertisingController@filter');
Route::get('vacancy_advertising/{id}/detail_iklan','VacancyAdvertisingController@detail_iklan');
Route::get('vacancy_advertising/{id}/form_tambah_loker','VacancyAdvertisingController@form_tambah_loker');
Route::post('vacancy_advertising/get_posisi_publish','VacancyAdvertisingController@get_posisi_publish');
Route::get('vacancy_advertising/{id}/delete_loker/{id_iklan}','VacancyAdvertisingController@delete_loker');
Route::get('vacancy_advertising/{id}/detail_pelamar','VacancyAdvertisingController@detail_pelamar');
Route::get('vacancy_advertising/{id}/personal_detail','VacancyAdvertisingController@personal_detail');
Route::get('vacancy_advertising/{id}/detail_pelamar/{status}','VacancyAdvertisingController@update_tabel');
Route::post('vacancy_advertising/get_adv_media','VacancyAdvertisingController@get_adv_media');
//Menu User
Route::get('menu_user','MenuUserController@index');
Route::post('tambah_menu_user','MenuUserController@tambah');
Route::get('menu_user/{id}/edit','MenuUserController@edit');
Route::get('menu_user/{id}/update','MenuUserController@update');

//Akreditasi
Route::get('akreditasi', 'AkreditasiController@index');
Route::post('tambah_akreditasi', 'AkreditasiController@tambah');
Route::get('akreditasi/{id}/edit', 'AkreditasiController@edit');
Route::get('akreditasi/{id}/update', 'AkreditasiController@update');
Route::post('import_akreditasi', 'AkreditasiController@import');

//user
Route::get('user','UsersController@index');
Route::post('tambah_user', 'UsersController@tambah');
Route::get('user/{id}/edit', 'UsersController@edit');
Route::get('user/{id}/update', 'UsersController@update');
Route::get('user/{id}/delete', 'UsersController@hapus');
