<?php

use App\Http\Controllers\Admin\ChatController;
use App\Http\Controllers\Admin\ChatsController;
use App\Http\Controllers\Admin\Settings\SettingsController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\AllPricesListsController;
use App\Http\Controllers\ChatsUserController;
use App\Http\Controllers\GetNewPriceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProcessingPriceController;
use App\Http\Controllers\RegistrationController;
use App\Http\Middleware\CheckAuth;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])
    ->middleware(CheckAuth::class)
    ->name('home');

Route::post('/', [HomeController::class, 'pullPriceList'])
    ->name('pullPriceList');

Route::post('allPricesLists', [AllPricesListsController::class, 'allPricesLists'])
    ->name('allPricesLists');

Route::post('processingPrice', [ProcessingPriceController::class, 'processingPrice'])
    ->name('processingPrice');

Route::post('uploadPrice',[GetNewPriceController::class,'uploadPrice'])
    ->name('uploadPrice');

Route::get('login', [LoginController::class, 'login'])
    ->name('login');

Route::post('login', [LoginController::class, 'checkLogin'])
    ->name('checkLogin');

Route::get('registration', [RegistrationController::class, 'registration'])
    ->name('registration');

Route::post('registration', [RegistrationController::class, 'stepRegistration'])
    ->name('stepRegistration');

Route::post('chatsUser', [ChatsUserController::class, 'chatsUser'])
    ->name('chatsUser');


Route::prefix('admin')->name('admin.')
    ->middleware(CheckAuth::class)
    ->group(function () {
        Route::resources([
            'users' => UsersController::class,
            'chats' => ChatsController::class,
            'chat' => ChatController::class,
            'settings' => SettingsController::class
        ]);
    });
