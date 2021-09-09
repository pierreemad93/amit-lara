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
        //user Process
            Route::get('/user/pdf' , [UserController::class, 'UsersPDF'])->name('userPDF') ;
            Route::get('/user/import', [UserController::class, 'importView'])->name('importview');
            Route::get('/user/export', [UserController::class, 'export'])->name('user.export');
            Route::post('/user/import', [UserController::class, 'import'])->name('user.import');
            Route::resource('/user' , UserController::class);
        //end userprocess 


        Route::resource('/role' , RoleController::class); 
    });
    
});

