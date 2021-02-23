<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users\UserController;


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

Route::get('/dashboard', [UserController::class, 'dashboard' ])->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::get('/banPage', function () {
    return view('banPage');
});


Route::get('/user/users/{status}', [UserController::class, 'show' ])->name('all-users');


Route::get ('/user/users/ADM/{id}/update', [UserController::class, 'updateUserStatus' ]);

Route::post('/user/users/ADM/{id}/update', [UserController::class, 'updateUserStatusSubmit' ])->name('user-update-status');


Route::get ('/user/users/ADM/{id}/ban', [UserController::class, 'updateUserBan' ]);

Route::post('/user/users/ADM/{id}/ban', [UserController::class, 'updateUserBanSub' ])->name('user-ban-status');


Route::get('/user/home/{id}', [UserController::class, 'home' ])->name('user-home-page');

Route::get('/user/home/{id}/update', [UserController::class, 'updateU' ])->name('user-update-page');

Route::post('/user/home/{id}/update', [UserController::class, 'updateUserSubmit' ])->name('user-update-submit');


Route::group(['namespace'=>'App\Http\Controllers\Users','prefix'=>'user'],function(){
    Route::resource('users','UserController')->names('user');
});

