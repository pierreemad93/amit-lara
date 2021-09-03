<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
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
Route::middleware('auth' , 'isAdmin' ,  'localeSessionRedirect', 'localizationRedirect', 'localeViewPath')->prefix(LaravelLocalization::setLocale())->group(function(){
    Route::prefix('admin')->group(function(){

        Route::get('/' , [DashboardController::class , 'index'])->name('dashboard');
        
        Route::get('/user/pdf' , [UserController::class, 'UsersPDF'])->name('userPDF') ;
        Route::resource('/user' , UserController::class);
        Route::resource('/role' , RoleController::class); 
    });
    
});

