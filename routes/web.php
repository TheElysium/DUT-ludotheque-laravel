<?php


use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\JeuController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
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


Route::get('/jeux/create', [JeuController::class, 'create'])->name('jeux.create');

Route::get('/jeux/{sort?}', [JeuController::class, 'index'])->name('jeux.index');




Route::post('/jeux/create', [JeuController::class, 'store'])->name('jeux.store');

Route::get('/jeux/show/{id}', [JeuController::class, 'show'])->name('jeux.show');


Route::post('/jeux/{id}', [CommentaireController::class, 'store'])->name('commentaires.store');


Route::get('/jeux/regles/{id}', [JeuController::class, 'regles'])->name('regles');

//Route::get('/{rand?}',[HomeController::class,'welcome'])->name('welcome');

Route::get('/critere',[HomeController::class,'welcome'])->name('welcome');

Route::middleware(['auth'])->group(function () {

    Route::post('/profil/delete', [JeuController::class, 'delete'])->name('jeux.delete');
    Route::get('/profil/promptdelete', [JeuController::class, 'promptdelete'])->name('user.promptdelete');
    Route::get('/profil/create', [UserController::class, 'create'])->name('user.ajoutJeux');
    Route::post('/profil/create', [UserController::class, 'store'])->name('user.storeJeux');
    Route::get('/profil/jeux/{sort?}', [UserController::class, 'jeux']) -> name('user.jeux');
    Route::get('/profil', [UserController::class, 'current'])->name('user.show');

});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
