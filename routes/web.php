<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FunnelController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ElementController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\IntegrationController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;


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

Route::middleware('auth')->group(function () {
    Route::resource('users', UserController::class);

Route::resource('funnels', FunnelController::class);

Route::resource('pages', PageController::class);

Route::resource('elements', ElementController::class);

Route::resource('leads', LeadController::class);

Route::resource('integrations', IntegrationController::class);

Route::resource('transactions', TransactionController::class);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});




Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'storeUser'])->name('register.store');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.authenticate');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');