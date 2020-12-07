<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


// Route::get('/', 'SiteController@home');
Route::get('/', function () {
	return View::make('site.home');
});

Route::get('/download/sertifikat/{id}', [ 'as' => 'download', 'uses' => 'SiteController@download']);
Route::get('/daftar-kegiatan', [ 'as' => 'daftar-kegiatan.certificate', 'uses' => 'SiteController@daftar_kegiatan']);
Route::get('/download/sertifikat/result/print/{data}', [ 'as' => 'print.certificate', 'uses' => 'SiteController@print_certificate']);
Route::get('/api-certificate/{kegiatan_id}/{data}', [ 'as' => 'api.certificate', 'uses' => 'SiteController@api_certificate']);
Route::get('/get-certificate/{kegiatan_id}', [ 'as' => 'get.certificate', 'uses' => 'SiteController@api_certificate']);
Route::get('/get-kegiatan', [ 'as' => 'get.kegiatan', 'uses' => 'SiteController@api_kegiatan']);

Route::get('/verification', [ 'as' => 'verification.certificate', 'uses' => 'SiteController@verification']);
Route::get('/verification/{data}', [ 'as' => 'verification.certificate', 'uses' => 'SiteController@get_verification']);
Route::post('/verification', [ 'as' => 'verification.certificate', 'uses' => 'SiteController@post_verification']);

Route::get('/registrasi/{kegiatan_id}', ['as' => 'registrasi', 'uses' => 'PesertaController@registrasi']);

Route::post('/post-registrasi/{kegiatan_id}',  ['as' => 'post.registrasi', 'uses' => 'PesertaController@post_registrasi']);
Route::get('/registrasi-success/{token}', ['as' => 'registrasi-success', 'uses' => 'PesertaController@registrasi_success']);


Route::get('/kehadiran/{kegiatan_id}',  'PesertaController@kehadiran');
Route::post('/kehadiran',  ['as' => 'check.in', 'uses' => 'PesertaController@check_in']);
Route::get('/kehadiran/{kegiatan_id}/json',  ['as' => 'get.kehadiran', 'uses' => 'PesertaController@get_kehadiran']);

Route::get('/forget-token',  ['as' => 'forget.token', 'uses' => 'PesertaController@forget_token']);
Route::get('/forget-token/{kegiatan_id}',  ['as' => 'api-forget.token', 'uses' => 'PesertaController@api_forget_token']);

Route::get('/login', 'UserController@login');
Route::post('/login', ['as' => 'get.login', 'uses' => 'UserController@get_login']);
Route::get('/logout', ['as' => 'get.logout', 'uses' => 'UserController@get_logout']);

Route::group(['before' => 'auth'], function () {
	Route::get('/kegiatan', 'KegiatanController@index');
	Route::get('/kegiatan/create', 'KegiatanController@create');
	Route::get('/kegiatan/{id}/edit', 'KegiatanController@edit');
	Route::post('/kegiatan/store',  ['as' => 'store.kegiatan', 'uses' => 'KegiatanController@store']);
	Route::get('/kegiatan/edit', 'KegiatanController@edit');
	Route::post('/kegiatan/update',  ['as' => 'update.kegiatan', 'uses' => 'KegiatanController@update']);
	Route::get('/kegiatan/{id}/delete', 'KegiatanController@delete');
	Route::get('/kegiatan/{id}/close', 'KegiatanController@close');
	Route::get('/kegiatan/{id}/close-kehadiran', 'KegiatanController@close_kehadiran');
	Route::get('/api-kegiatan', ['as' => 'api.kegiatan', 'uses' => 'KegiatanController@api_kegiatan']);
    	Route::get('/kegiatan/{id}/close-sertifikat', 'KegiatanController@close_sertifikat');
	Route::get('/kegiatan/{id}/visible', 'KegiatanController@visible');

	//css editor
	Route::get('/css/{id}/edit', 'KegiatanController@css_edit');
	Route::post('/css/update',  ['as' => 'update.css', 'uses' => 'KegiatanController@css_update']);
	Route::get('/css/{id}/demo-sertifikat',  ['as' => 'demo.sertifikat', 'uses' => 'KegiatanController@demo_sertifikat']);

	Route::get('/peserta', 'PesertaController@index');
	Route::get('/peserta/create', 'PesertaController@create');
	Route::get('/peserta/{id}/edit', 'PesertaController@edit');
	Route::post('/peserta/store',  ['as' => 'store.peserta', 'uses' => 'PesertaController@store']);
	Route::get('/peserta/edit', 'PesertaController@edit');
	Route::post('/peserta/update',  ['as' => 'update.peserta', 'uses' => 'PesertaController@update']);
	Route::get('/peserta/{id}/delete', 'PesertaController@delete');
	Route::get('/api-peserta', ['as' => 'api.peserta', 'uses' => 'PesertaController@api_peserta']);
	Route::get('/api-peserta/{kegiatan_id}', ['as' => 'api.peserta-kegiatan', 'uses' => 'PesertaController@api_peserta']);
	Route::get('/peserta/post-kehadiran/{id}', ['as' => 'post.kehadiran', 'uses' => 'PesertaController@post_kehadiran']);

	#Import Peserta
	Route::get('/peserta/import-peserta', 'ImportPesertaController@index');
	Route::post('/peserta/import-peserta', ['as' => 'import.peserta', 'uses' => 'ImportPesertaController@import_peserta']);
	Route::get('/peserta/import-template', 'ImportPesertaController@import_template');

	#Export Peserta
	Route::get('/peserta/export-peserta', 'ExportPesertaController@index');
	Route::post('/peserta/export-peserta', ['as' => 'export.peserta', 'uses' => 'ExportPesertaController@export_peserta']);
	
	Route::get('/dashboard', ['before' => 'auth', 'uses' => 'DashboardController@dashboard']);
});
