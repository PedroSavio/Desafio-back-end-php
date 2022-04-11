<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use Doctrine\DBAL\Schema\Index;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Models\Usuario;
use Illuminate\Auth\Events\Login;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

//Route::resource('usuarios', 'Usuariocontroller@login');
//Route::put('/login',UsuarioController::class);
Route::Resource('usuarios',UsuarioController::class);

Route::controller(UsuarioController::class) -> group(function () {
    Route::post('/login', [UsuarioController::class, 'login']);
    Route::get('/Show', [UsuarioController::class, 'showAll']);
});