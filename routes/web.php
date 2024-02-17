<?php

use App\Http\Controllers\AuthUser; // Контроллер обработки данных пользователей
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ScriptController;
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

// ГЛАВНАЯ СТРАНИЦА ПРОЕКТА
Route::get('/', function () {  return view('index'); })->name('index');
Route::get('/admin', function () {  return view('admin.admin'); })->name('admin');


// СТРАНИЦА АВТОРИЗАЦИЯ
Route::get('/login', function () { return view('auth.login'); })->name('login');



// Группа роутера, которая относится к одному контроллеру аунтефикации
Route::controller(AuthUser::class)->group(function () {
    Route::post('/authlogin', 'loginuser')->name('login');
    Route::post('/authreg', 'reguser')->name('register');
});



// КАТАЛОГ
Route::get('/scripts', [ScriptController::class, 'index'])->name('scripts.index');



// ДОБАВЛЕНИЕ КАТЕГОРИИ
Route::get('/categories/create_category', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');



// РЕДАКТИРОВАНИЕ КАТЕГОРИИ
Route::get('/categories/{id}/edit_category', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');



// УДАЛЕНИЕ КАТЕГОРИИ
Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');



// ДОБАВЛЕНИЕ СКРИПТА
Route::get('/scripts/create_script', [ScriptController::class, 'create'])->name('scripts.create');
Route::post('/scripts', [ScriptController::class, 'store'])->name('scripts.store');



// ПРОСМОТР СКРИПТА
Route::get('/scripts/{id}', [ScriptController::class, 'show'])->name('scripts.show');



// РЕДАКТИРОВАНИЕ СКРИПТА
Route::get('/scripts/{id}/edit_script', [ScriptController::class, 'edit'])->name('scripts.edit');
Route::put('/scripts/{id}', [ScriptController::class, 'update'])->name('scripts.update');



// УДАЛЕНИЕ СКРИПТА
Route::delete('/scripts/{id}', [ScriptController::class, 'destroy'])->name('scripts.destroy');
