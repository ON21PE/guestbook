<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\EntriesController;


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
Route::get('/login', [AuthController::class, 'login']);
Route::get('/registration', [AuthController::class, 'registration']);
Route::post('/register-user', [AuthController::class, 'registerUser'])->name('register-user');
Route::post('/login-user', [AuthController::class, 'loginUser'])->name('login-user');
Route::get('/guestbook', [IndexController::class, 'indexAction'])->middleware('isLoggedIn');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('isLoggedIn');;
Route::get('add-entry', [EntriesController::class, 'addEntry'])->middleware('isLoggedIn');;
Route::get('edit-entry/{id}', [EntriesController::class, 'editEntry'])->middleware('isLoggedIn');;
Route::post('save-entry', [EntriesController::class, 'saveEntry'])->middleware('isLoggedIn');;
Route::post('update-entry', [EntriesController::class, 'updateEntry'])->middleware('isLoggedIn');;
Route::get('delete-entry/{id}', [EntriesController::class, 'deleteEntry'])->middleware('isLoggedIn');;
Route::get('/search', [EntriesController::class, 'search'])->middleware('isLoggedIn');;




