<?php


use App\Http\Controllers\Admin\ChatsController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\AllPricesListsController;
use App\Http\Controllers\ChatsUserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProcessingPriceController;
use App\Http\Controllers\RegistrationController;
use App\Http\Middleware\CheckAuth;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])
//    Route::get('/', [HomeController::class, 'getCourse'])
    ->middleware(CheckAuth::class)
    ->name('home');

Route::post('/',[HomeController::class, 'pullPriceList'])
    ->name('pullPriceList');

Route::post('allPricesLists',[AllPricesListsController::class, 'allPricesLists'])
    ->name('allPricesLists');

Route::post('processingPrice',[ProcessingPriceController::class, 'processingPrice'])
    ->name('processingPrice');

Route::get('processingPrice',[ProcessingPriceController::class, 'getPrice'])
    ->name('getPrice');

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
