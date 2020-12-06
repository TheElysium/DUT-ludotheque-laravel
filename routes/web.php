<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\JeuController;
use App\Http\Controllers\HomeController;

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


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');



Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/jeux/show/{id}', [JeuController::class, 'show'])->name('jeu_show');

Route::get('/jeux/rules/{id}', [JeuController::class, 'rules'])->name('jeu_rules');

Route::get('/jeux/', [JeuController::class, 'index'])->name('jeu_index');


