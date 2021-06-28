<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::view('/laravel-welcome', 'welcome')->name('laravel.welcome');

Route::view('/', 'beranda')->name('beranda');
Route::view('/visi', 'umum.visi')->name('visi');
Route::view('/partner', 'umum.partnership')->name('partner');
Route::view('/faq', 'umum.faq')->name('faq');
Route::view('/kontak', 'umum.kontak')->name('kontak');
Route::view('/links', 'umum.links')->name('link');
Route::view('/covid19', 'umum.covid19')->name('covid19');
Route::view('/kamar/ketentuan', 'kamar/ketentuan')->name('ketentuan');

Route::get('/kamar', 'KamarController@index')->name('kamar');
Route::get('/kamar/k/{kota}', 'KamarController@showAllByCity')->name('kamar.kota');
Route::get('/kamar/n/{negara}', 'KamarController@showAllByNation')->name('kamar.negara');
Route::get('/kamar/{kamar}', 'KamarController@showOneRoom')->name('kamar.detail');
Route::get('/kamar/filters', 'KamarController@filter')->name('kamar.filter');
Route::get('/kamar/baru', 'KamarController@create')->name('kamar.baru');
Route::post('/kamar/baru', 'KamarController@store')->name('kamar.store');

Route::get('/desa', 'DesaController@index')->name('desa');

Route::get('/negara', 'NegaraController@index')->name('negara');
Route::post('/negara', 'NegaraController@store')->name('negara.store');
Route::get('/negara/create', 'NegaraController@create')->name('negara.create');
Route::get('/negara/{negara}', 'NegaraController@show')->name('negara.show');
Route::delete('/negara/{negara}', 'NegaraController@destroy')->name('negara.destroy');
Route::patch('/negara/{negara}', 'NegaraController@update')->name('negara.update');
Route::get('/negara/{negara}/edit', 'NegaraController@edit')->name('negara.edit');

Auth::routes(['verify' => true]);

Route::group(['middleware' => ['auth','verified']], function () {
    Route::get('/kamar/saya', 'KamarController@indexKamarHost')->name('kamar.saya');
    Route::get('/kamar/{kamar}/edit', 'KamarController@editKamar')->name('kamar.edit');
    
    Route::get('/profile', 'ProfileController@index')->name('profile');
    Route::post('/profile', 'ProfileController@update')->name('profile.update');
});

Route::redirect('/karier', 'https://karier.kamarpelajar.com')->name('karier');
Route::redirect('/t/oprec', 'https://docs.google.com/forms/d/e/1FAIpQLScTLKfFP1xXEnKjf7haNsZnnf9kPF1v8i977yBF3XLHHQUh7w/viewform?usp=sf_link');
Route::redirect('/oprec', 'https://docs.google.com/forms/d/e/1FAIpQLScTLKfFP1xXEnKjf7haNsZnnf9kPF1v8i977yBF3XLHHQUh7w/viewform?usp=sf_link');