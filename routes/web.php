<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['as' => 'site.'], function () {

    Route::get('/', [\App\Http\Controllers\SiteController::class, 'index'])->name('welcome');
    Route::get('/news', 'App\Http\Controllers\SiteController@news')->name('news.index');
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

});


Route::group([
    'middleware' => ['role:admin'],
    'as' => 'crm.',
    'prefix' => 'crm'
], function () {
    Route::get('/crm','App\Http\Controllers\CRMControlerController@index')->name('crm');
    Route::get('/users', 'App\Http\Controllers\HomeController@editAllUsers')->name('users');
    Route::get('/users/{user}/edit', 'App\Http\Controllers\HomeController@editUser')->name('users.edit');
    Route::post('/users/{user}/update', 'App\Http\Controllers\HomeController@update')->name('users.update');
    Route::delete('/users/{user}','App\Http\Controllers\HomeController@destroy')->name('users.destroy');
    Route::get('/news/created', 'App\Http\Controllers\NewsController@create')->name('news.created');
    Route::POST('/news/store', 'App\Http\Controllers\NewsController@store')->name('news.store');
    Route::get('/news', 'App\Http\Controllers\NewsController@index')->name('news.index');
    Route::delete('/news/{news}','App\Http\Controllers\NewsController@destroy')->name('news.destroy');
});
require __DIR__ . '/auth.php';
