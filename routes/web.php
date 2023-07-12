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
    Route::get('/shop','App\Http\Controllers\SiteController@shop')->name('shop.index');
    Route::get('/dashboard', function () {
        $user=Auth::user();
        return view('dashboard',$user);
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
    Route::get('/','App\Http\Controllers\CRMControlerController@index')->name('home');
    Route::get('/users', 'App\Http\Controllers\HomeController@editAllUsers')->name('users.index');
    Route::get('/users/{user}/edit', 'App\Http\Controllers\HomeController@editUser')->name('users.edit');
    Route::post('/users/{user}/update', 'App\Http\Controllers\HomeController@update')->name('users.update');
    Route::delete('/users/{user}','App\Http\Controllers\HomeController@destroy')->name('users.destroy');

    Route::get('/news/created', 'App\Http\Controllers\NewsController@create')->name('news.create');
    Route::POST('/news/store', 'App\Http\Controllers\NewsController@store')->name('news.store');
    Route::get('/news', 'App\Http\Controllers\NewsController@index')->name('news.index');
    Route::get('/news/{news}/edit', 'App\Http\Controllers\NewsController@edit')->name('news.edit');
    Route::post('/news/{news}/update', 'App\Http\Controllers\NewsController@update')->name('news.update');
    Route::delete('/news/{news}','App\Http\Controllers\NewsController@destroy')->name('news.destroy');
    Route::get('/news/{news}', 'App\Http\Controllers\NewsController@published')->name('news.published');
});
require __DIR__ . '/auth.php';
