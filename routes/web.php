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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->get('/dashboard', [\App\Http\Controllers\HomeController::class, 'cinqAleatoires'])->name('dashboard');

Route::get('/jeux/{id}', function ($id) {
    return view('welcome');
})->name('jeux.show');
