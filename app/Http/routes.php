<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    
    Route::get('/', 'HomeController@index');

	Route::auth();

	Route::get('/home', 'HomeController@index');
	Route::get('profil', 'HomeController@profil');
	
	Route::resource('pensiun', 'PensiunController');
	Route::resource('tugasbelajar', 'TugasBelajarController');
	Route::resource('pangkat', 'PangkatController');
	Route::resource('pegawai', 'PegawaiController');
	Route::get('pegawai/pdf', 'PegawaiController@exportPdf');

	Route::get('file/upload/{pegawai_id?}', 'FileController@create');
	Route::get('file/browser/{pegawai_id?}', 'FileController@show');
	Route::post('file/upload', 'FileController@upload');
	Route::delete('file/destroy/{pegawai_id?}', 'FileController@destroy');

	Route::resource('bidang', 'BidangController');

	Route::post('tutorial/resize-upload-image-file','PegawaiController@postResizeUploadImageFile');
	Route::get('tutorial/remove-image-file','PegawaiController@getRemoveImageFile');

	Route::get('download/{file_id?}/{pegawai_id?}', 'DownloadController@download');
	Route::get('preview/{source?}/{file?}', 'FileController@preview');

	Route::get('laporanbidang','LaporanController@getBidang');


	Route::get('grafik_berdasarkan_pendidikan','HomeController@grafikPendidikan');
	Route::get('grafik_berdasarkan_pangkat','HomeController@grafikPangkat');
	Route::get('grafik_berdasarkan_bidang','HomeController@grafikBidang');

	Route::get('tugasbelajar/list/{year?}', 'TugasBelajarController@show');

	Route::get('search', 'PegawaiController@search');
});



Route::get('/foo', function()
{
   return \Auth::user()->id;
});



