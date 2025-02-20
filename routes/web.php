<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\UserController;
use App\Http\Controllers\SalleController;

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


// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/login', function () {
//     return view('login');
// });
// Route::get('/regestre', function () {
//     return view('registration');
// });
// Route::get('/dashboard', function () {
//     return view('dashboard');
// });
Route::get('/SalleCreate', [SalleController::class,'Salle']);    
Route::post('/create', [SalleController::class,'create']);   

    // route::controller(SalleController::class)->group(function(){
    //     Route::get('/', [SalleController::class,'index'])->name('login');    
    // })
    // Route::controller(UserController::class)->group(function(){

    // Route::get('login', [UserController::class,'index'])->name('login');

    // Route::get('registration', 'registration')->name('registration');

    // Route::get('logout', 'logout')->name('logout');

    // Route::post('validate_registration', 'validate_registration')->name('user.validate_registration');

    // Route::post('validate_login', 'validate_login')->name('user.validate_login');

    // Route::get('dashboard', 'dashboard')->name('dashboard');});



