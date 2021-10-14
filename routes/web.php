<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return redirect('login');
});

Route::get('/home', function () {
    return redirect('dashboard');
});

Auth::routes();

Route::group(['prefix' => 'dashboard', 'middleware' => ['web','auth']], function(){
    Route::get('/', [App\Http\Controllers\BerandaController::class, 'index'])->name('dashboard.index');

    Route::resource('/staff',\App\Http\Controllers\StaffController::class);
    Route::resource('/mapel',\App\Http\Controllers\MapelController::class)->except(['show','create']);
    // ->except(['show'])
    Route::resource('/guru',\App\Http\Controllers\GuruController::class);
    Route::resource('/kelas',\App\Http\Controllers\KelasController::class);
    Route::resource('/siswa',\App\Http\Controllers\SiswaController::class);

        

    //file manager
    Route::group(['prefix' => 'filemanager'], function () {
        // Route::get('/filemanager',[\App\Http\Controllers\Backend\FileManagerController::class,'index'])->name('filemanager.index');
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });

});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
