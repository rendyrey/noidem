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


Route::get('/2', function () {
    return view('formlamaran2');
});

// Campus Reqruitment 
Route::get('cr', 'CampusReqruitmentController@index');

// Job Fair
Route::get('jobfair', 'JobFairController@index');

// Admin 
Route::get('admin', 'DashboardController@index');

//Dashboard
Route::get('dashboard', 'DashboardController@index');

//Bidang Usaha
Route::get('bidang_usaha', 'BidangUsahacontroller@index');
Route::post('tambah_bidang_usaha', 'BidangUsahacontroller@tambah');
Route::get('bidang_usaha/{id}/edit', 'BidangUsahacontroller@edit');
Route::get('bidang_usaha/{id}/update', 'BidangUsahacontroller@update');

//Institusi
Route::get('institusi', 'Institusicontroller@index');
Route::post('import_institusi', 'Institusicontroller@import');
Route::post('tambah_institusi', 'Institusicontroller@tambah');
Route::get('institusi/{id}/edit', 'Institusicontroller@edit');
Route::get('institusi/{id}/update', 'Institusicontroller@update');

//Provinsi
Route::get('provinsi', 'Provinsicontroller@index');
Route::post('tambah_provinsi', 'Provinsicontroller@tambah');
Route::get('provinsi/{id}/edit', 'Provinsicontroller@edit');
Route::get('provinsi/{id}/update', 'Provinsicontroller@update');

//Kota
Route::get('kota', 'Kotacontroller@index');
Route::post('tambah_kota', 'Kotacontroller@tambah');
Route::get('kota/{id}/edit', 'Kotacontroller@edit');
Route::get('kota/{id}/update', 'Kotacontroller@update');

//Major Grup
Route::get('major_grup', 'MajorGrupController@index');
Route::post('tambah_major_grup', 'MajorGrupController@tambah');
Route::get('major_grup/{id}/edit', 'MajorGrupController@edit');
Route::get('major_grup/{id}/update', 'MajorGrupController@update');

//major
Route::get('major', 'MajorController@index');
Route::post('tambah_major', 'MajorController@tambah');
Route::get('major/{id}/edit', 'MajorController@edit');
Route::get('major/{id}/update', 'MajorController@update');

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

//Vacancy Advertising
Route::get('vacancy_advertising', 'VacancyAdvertisingController@index');
Route::post('tambah_iklan', 'VacancyAdvertisingController@tambah_iklan');
Route::post('tambah/{id}/loker', 'VacancyAdvertisingController@tambah_loker');
Route::get('vacancy_advertising/{id}/edit_iklan', 'VacancyAdvertisingController@edit_iklan');
Route::get('vacancy_advertising/{id}/update_iklan', 'VacancyAdvertisingController@update_iklan');
Route::get('vacancy_advertising/{id}/edit_loker', 'VacancyAdvertisingController@edit_loker');
Route::get('vacancy_advertising/{id}/update_loker', 'VacancyAdvertisingController@update_loker');

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
