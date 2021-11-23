<?php

use App\Http\Controllers\Admin\ChatsController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\ChatsUserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;
use App\Http\Middleware\CheckAuth;
use App\Mail\EmailUsers;
use Illuminate\Support\Facades\Mail;
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

Route::get('/', [HomeController::class, 'index'])
    ->middleware(CheckAuth::class)
    ->name('home');

Route::get('login',[LoginController::class, 'login'])
    ->name('login');

Route::post('login',[LoginController::class, 'checkLogin'])
    ->name('checkLogin');

Route::get('registration',[RegistrationController::class, 'registration'])
    ->name('registration');

Route::post('registration',[RegistrationController::class, 'stepRegistration'])
    ->name('stepRegistration');

Route::post('chatsUser',[ChatsUserController::class, 'chatsUser'])
    ->name('chatsUser');


Route::prefix('admin')->name('admin.')
    ->middleware(CheckAuth::class)
    ->group(function (){
Route::resources([
    'users' => UsersController::class,
    'chats' => ChatsController::class
]);
});
