<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', function () {
    return view('index.register');
});


Route::get('/login', function () {
    return view('index.login');
});


Route::get('/pokedex', function () {
    return view('index.pokedex');
});

Route::get('/ruleta', function () {
    return view('index.ruleta');
});

Route::get('/recompensa', function () {
    return view('index.recompensa');
});

Route::get('/imagen', function () {
    $path = public_path('rlaragon\www\PokeTeam\Vamoa.jpeg');
    return response()->file($path);
});


