<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


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



// List users
Route::get('/', [UserController::class, 'index'])->name('users.index');

// Show the create user form
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');

// Store a new user
Route::post('/users', [UserController::class, 'store'])->name('users.store');

// Show user details
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');

// Show the edit user form
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');

// Update a user
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');

// Delete a user
Route::delete('/users/delete/{user}', [UserController::class, 'destroy'])->name('users.destroy');

