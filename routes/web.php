<?php

use App\Http\Controllers\JeuController;
use App\Http\Controllers\HomeController;
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
    return view('welcome');
});


Route::get('/enonce', function () {
    return view('enonce.index');
});

Route::resource('jeux', \App\Http\Controllers\JeuController::class);

Route::get('/jeux/regles/{id}', [JeuController::class, 'regles'])->name('regles');

Route::get('/{rand}',[HomeController::class,'welcome'])->name('welcome');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


