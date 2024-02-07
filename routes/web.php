<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RentLogsController;
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

Route::middleware('guest')->group(function (){
    Route::get('/', function () {
        return view('welcome');
});

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'auth']);
Route::get('register', [AuthController::class, 'register']);
Route::post('register', [AuthController::class, 'regis']);
});

Route::middleware('auth')->group(function (){
Route::get('profile', [UserController::class, 'profile'])->middleware(['only_client']);
Route::get('dashboard', [AdminController::class, 'index'])->middleware(['only_admin']);

Route::get('users-benned', [AdminController::class, 'usersBenned']);
Route::get('users-ban/{slug}', [AdminController::class, 'usersBan']);
Route::get('users-detail/{slug}', [AdminController::class, 'usersDetail']);
Route::get('users-registered', [AdminController::class, 'usersRegistered']);
Route::get('users-restore/{slug}', [AdminController::class, 'usersRestore']);
Route::get('users-approve/{slug}', [AdminController::class, 'usersApprove']);
Route::get('user', [AdminController::class, 'users'])->middleware(['only_admin']);

Route::get('category', [AdminController::class, 'category'])->middleware(['only_admin']);
Route::get('category_add', [AdminController::class, 'categoryAdd'])->middleware(['only_admin']);
Route::post('category_add', [AdminController::class, 'categoryStore'])->middleware(['only_admin']);
Route::get('category_edit/{slug}', [AdminController::class, 'categoryEdit'])->middleware(['only_admin']);
Route::put('category_edit/{slug}', [AdminController::class, 'categoryUpdate'])->middleware(['only_admin']);
Route::get('category_delete/{slug}', [AdminController::class, 'categoryDestroy'])->middleware(['only_admin']);

Route::get('books', [AdminController::class, 'books'])->middleware(['only_admin']);
Route::get('books_add', [AdminController::class, 'booksAdd'])->middleware(['only_admin']);
Route::post('books_add', [AdminController::class, 'booksStore'])->middleware(['only_admin']);
Route::get('books_edit/{slug}', [AdminController::class, 'booksEdit'])->middleware(['only_admin']);
Route::put('books_edit/{slug}', [AdminController::class, 'booksUpdate'])->middleware(['only_admin']);
Route::get('books_delete/{slug}', [AdminController::class, 'booksDestroy'])->middleware(['only_admin']);

Route::get('book-user', [UserController::class, 'book']);

Route::get('rent_logs', [AdminController::class, 'rent_logs'])->middleware(['only_admin']);
Route::get('rentlogs-add', [RentLogsController::class,'add']);
Route::post('rentlogs-add', [RentLogsController::class,'store']);
Route::get('return-logs', [RentLogsController::class,'edit']);
Route::post('return-logs', [RentLogsController::class,'update']);

Route::get('logout', [AuthController::class,'logout']);
});
