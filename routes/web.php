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
Route::middleware('auth')->group(function (){

});
Route::get('/',[HomeController::class,'index'])->name('frontend.home');
Route::post('/register',[HomeController::class,'store'])->name('frontend.data.store');
Route::get('/success',[HomeController::class,'success'])->name('frontend.registration.success');
Route::get('/login',[HomeController::class,'showLogin'])->name('frontend.login');
Route::post('/login',[HomeController::class,'login'])->name('login');
Route::middleware('auth')->group(function (){
    Route::get('/dashboard',[HomeController::class,'dashboard'])->name('dashboard');
    Route::get('/logout',[HomeController::class,'logout'])->name('logout');
});

