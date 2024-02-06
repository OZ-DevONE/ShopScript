<?php

use App\Http\Controllers\AuthUser; // Контроллер обработки данных пользователей
use Illuminate\Support\Facades\Route;

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
    return view('index');
});
// Главная страница проекта

Route::get('/login', function () {
    return view('auth.login');
})->name('login');
// Страница логина


// Группа роутера, которая относится к одному контроллеру аунтефикации
Route::controller(AuthUser::class)->group(function () {
    Route::post('/authlogin', 'loginuser')->name('login');
    Route::post('/authreg', 'reguser')->name('register');
});
