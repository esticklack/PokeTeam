<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\PokemonController;
use App\Http\Controllers\Api\RecompensaController;
use App\Http\Controllers\Api\RuletaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::post('register', [RegisterController::class, 'register']);

Route::post('login', [RegisterController::class, 'login']);

Route::post('verificar-email', [RegisterController::class, 'verificarEmail']);


Route::resource('pokedex', PokemonController::class);

Route::post('verificar-recompensa', [RecompensaController::class, 'verificarRecompensa']);

Route::post('verificar-tiempo/{id}', [RecompensaController::class, 'verificarTiempo']);

Route::post('guardar-recompensa/{id}', [RecompensaController::class, 'guardarRecompensa']);

Route::post('verificar-ruleta', [RuletaController::class, 'verificarRuleta']);

Route::post('guardar-oro/{id}', [RuletaController::class, 'guardarOro']);

