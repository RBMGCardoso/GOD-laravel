<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserAuthController;

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

Route::get('/dashboard', [MainController::Class, 'DashboardPage'])->name('dashboardPage');

Route::get('/ocorrencia', [MainController::Class, 'OcorrenciaPage'])->name('ocorrenciaPage');

Route::post('/criarOcorrencia', [MainController::Class, 'criarOcorrencia'])->name('ocorrencia.criar');

Route::get('/registar', [MainController::Class, 'RegisterPage'])->name('registerPage');

//Route::get('/login', [MainController::Class, 'LoginPage']);

Route::get('/login', [UserAuthController::Class, 'Login'])->name('login');

Route::get('/logout', [UserAuthController::Class, 'logout'])->name('logout');

Route::post('check', [UserAuthController::Class, 'check'])->name('auth.check');