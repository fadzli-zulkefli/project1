<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*

$proxy_url    = getenv('PROXY_URL');
$proxy_schema = getenv('PROXY_SCHEMA');

if (!empty($proxy_url)) {
    URL::forceRootUrl($proxy_url);
}

if (!empty($proxy_schema)) {
    URL::forceScheme($proxy_schema);
}

*/

/*
Route::get('/', function () {
    return view('welcome');
})->name('public_home');
*/
//Auth::routes(['register' => false]);

Route::get('/', 'PublicController@welcome')->name('public_home');

Route::get('/semakan', 'PublicController@semakan');
Route::post('/semakan-kematian', 'PublicController@permohonanKematian')->name('post.semakan_kematian');

//Route::post('/permohonan', 'PublicController@permohonan'); // OFF SEBAB SEMAKAN SHJ


Auth::routes(['verify' => true, 'register' => false]);

Route::middleware(['auth', 'CheckAdmin'])->group(function () {

    Route::get('/admin', 'LogSemakan2Controller@index'); //->middleware('verified');

    //get_file($file_path)
    Route::get('/get_file/{file_path}', 'HomeController@get_file');

    Route::resource('users', 'UserController');

    Route::resource('kategoriPermohonans', 'KategoriPermohonanController');



    Route::resource('jenisUploads', 'JenisUploadController');

    Route::resource('permohonans', 'PermohonanController');
    //pemohon
    Route::resource('pemohon', 'PemohonController');

    Route::post('/pemohon/import', 'ImportCsvController@web_import');
    Route::post('/pemohon-kematian/import', 'ImportCsvController@web_import_kematian');

    Route::resource('logSemakan2s', 'LogSemakan2Controller');

    Route::resource('permohonanKematians', 'permohonanKematianController');

});

//debug purpose
// Route::get('/xxxx', function () {
//     // dd(\App\Models\permohonanKematian::all()->count());
// });


