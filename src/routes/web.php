<?php

use App\Http\Controllers\MainController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', [MainController::class, 'main'])->middleware('auth')->name('main');

Route::group(['middleware' => 'auth', 'prefix' => 'user'], function () {
    Route::get('/create', [MainController::class, 'newUser'])->name('new_user');
    Route::post('/create', [MainController::class, 'create'])->name('create_user');
    Route::get('/{id}', [MainController::class, 'user'])->name('edit_user');
    Route::get('/{id}/delete', [MainController::class, 'confirmRemove'])->name('delete_user');
    Route::post('/{id}/update', [MainController::class, 'update'])->name('update_user');
    Route::post('/delete', [MainController::class, 'delete'])->name('remove_user');
});


