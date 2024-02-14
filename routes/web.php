<?php

use App\Http\Controllers\AuthUser; // Контроллер обработки данных пользователей
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



Route::get('/scripts', [ScriptController::class, 'index'])->name('scripts.index');

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
