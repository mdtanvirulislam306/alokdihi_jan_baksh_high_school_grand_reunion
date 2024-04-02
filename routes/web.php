<?php

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

Route::get('/',[HomeController::class,'index'])->name('frontend.home');
Route::post('/register',[HomeController::class,'store'])->name('frontend.data.store');
Route::get('/success',[HomeController::class,'success'])->name('frontend.registration.success');
Route::get('/login',[HomeController::class,'showLogin'])->name('frontend.login');
Route::post('/login',[HomeController::class,'login'])->name('login');
Route::get('/sponser',[HomeController::class,'getSponserList'])->name('sponser');
Route::middleware('auth')->group(function (){
    Route::get('/dashboard',[HomeController::class,'dashboard'])->name('dashboard');
    Route::get('/export',[HomeController::class,'export'])->name('export');
    Route::get('/status/{id}',[HomeController::class,'status'])->name('status');
     Route::get('/delete/{id}',[HomeController::class,'delete'])->name('delete');
    Route::get('/logout',[HomeController::class,'logout'])->name('logout');
});

