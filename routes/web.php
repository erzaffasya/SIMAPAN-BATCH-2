<?php

use App\Http\Controllers\DependantDropdownController;
use App\Http\Controllers\JenisKekerasanController;
use App\Http\Controllers\JenisLayananController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\TinyMceController;
use App\Http\Controllers\UserController;
use App\Models\JenisLayanan;
use Illuminate\Support\Facades\Route;

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




// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');

Route::get('provinces', 'DependentDropdownController@provinces')->name('provinces');
Route::get('cities', 'DependentDropdownController@cities')->name('cities');
Route::get('districts', 'DependentDropdownController@districts')->name('districts');
Route::get('villages', [DependantDropdownController::class, 'villages'])->name('villages');

// Route::get('/', [LandingpageController::class, 'index'])->name('index');

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::resource('user', UserController::class);
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');

    Route::resource('pengaduan', PengaduanController::class);
    Route::resource('jenis-kekerasan', JenisKekerasanController::class);
    Route::resource('jenis-layanan', JenisLayananController::class);

    //tiny mce upload
    Route::post('tiny-upload', [TinyMceController::class, "upload"])->name('tiny-upload');
});

$middleware = array_merge(\Config::get('lfm.middlewares'), [
    '\UniSharp\LaravelFilemanager\Middlewares\MultiUser',
    '\UniSharp\LaravelFilemanager\Middlewares\CreateDefaultFolder',
]);
$prefix = \Config::get('lfm.url_prefix', \Config::get('lfm.prefix', 'laravel-filemanager'));
$as = 'unisharp.lfm.';
$namespace = '\UniSharp\LaravelFilemanager\Controllers';

// make sure authenticated
Route::group(compact('middleware', 'prefix', 'as', 'namespace'), function () {

    // Show LFM
    Route::get('/', [
        'uses' => 'LfmController@show',
        'as' => 'show',
    ]);

    // Show integration error messages
    Route::get('/errors', [
        'uses' => 'LfmController@getErrors',
        'as' => 'getErrors',
    ]);

    // upload
    Route::any('/upload', [
        'uses' => 'UploadController@upload',
        'as' => 'upload',
    ]);

    // list images & files
    Route::get('/jsonitems', [
        'uses' => 'ItemsController@getItems',
        'as' => 'getItems',
    ]);

    // folders
    Route::get('/newfolder', [
        'uses' => 'FolderController@getAddfolder',
        'as' => 'getAddfolder',
    ]);
    Route::get('/deletefolder', [
        'uses' => 'FolderController@getDeletefolder',
        'as' => 'getDeletefolder',
    ]);
    Route::get('/folders', [
        'uses' => 'FolderController@getFolders',
        'as' => 'getFolders',
    ]);

    // crop
    Route::get('/crop', [
        'uses' => 'CropController@getCrop',
        'as' => 'getCrop',
    ]);
    Route::get('/cropimage', [
        'uses' => 'CropController@getCropimage',
        'as' => 'getCropimage',
    ]);
    Route::get('/cropnewimage', [
        'uses' => 'CropController@getNewCropimage',
        'as' => 'getCropimage',
    ]);

    // rename
    Route::get('/rename', [
        'uses' => 'RenameController@getRename',
        'as' => 'getRename',
    ]);

    // scale/resize
    Route::get('/resize', [
        'uses' => 'ResizeController@getResize',
        'as' => 'getResize',
    ]);
    Route::get('/doresize', [
        'uses' => 'ResizeController@performResize',
        'as' => 'performResize',
    ]);

    // download
    Route::get('/download', [
        'uses' => 'DownloadController@getDownload',
        'as' => 'getDownload',
    ]);

    // delete
    Route::get('/delete', [
        'uses' => 'DeleteController@getDelete',
        'as' => 'getDelete',
    ]);

    // Route::get('/demo', 'DemoController@index');
});

Route::group(compact('prefix', 'as', 'namespace'), function () {
    // Get file when base_directory isn't public
    $images_url = '/' . \Config::get('lfm.images_folder_name') . '/{base_path}/{image_name}';
    $files_url = '/' . \Config::get('lfm.files_folder_name') . '/{base_path}/{file_name}';
    Route::get($images_url, 'RedirectController@getImage')
        ->where('image_name', '.*');
    Route::get($files_url, 'RedirectController@getFile')
        ->where('file_name', '.*');
});

require __DIR__ . '/auth.php';
