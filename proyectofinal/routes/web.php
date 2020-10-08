<?php

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

Route::resource('Dispositivo', 'DispositivoController');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/Mediciones', function () {
    return view('Mediciones.index');
});

Route::get('/Mediciones/{topic}', function ($topic) {
    return view('Mediciones.show',compact('topic'));
});