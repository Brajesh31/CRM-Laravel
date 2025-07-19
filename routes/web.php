<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\NoteController;

// Home page route
Route::view('/', 'welcome')->name('home');

// Routes accessible only to guests (unauthenticated users)
Route::middleware('guest')->group(function () {
    Route::get('register', [UserController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [UserController::class, 'register'])->name('register.store');
    Route::get('crm', [UserController::class, 'showLoginForm'])->name('login');
    Route::post('login', [UserController::class, 'login'])->name('login.store');
});

// Logout route accessible only to authenticated users
Route::post('logout', [UserController::class, 'logout'])->middleware('auth')->name('logout');

// Routes accessible only to authenticated users (clients and notes)
Route::middleware('auth')->group(function () {
    Route::get('clients', [ClientController::class, 'index'])->name('clients.index');
    Route::get('clients/create', [ClientController::class, 'create'])->name('clients.create');
    Route::post('clients', [ClientController::class, 'store'])->name('clients.store');
    Route::get('clients/{client}', [ClientController::class, 'show'])->name('clients.show');
    Route::get('clients/{client}/edit', [ClientController::class, 'edit'])->name('clients.edit');
    Route::put('clients/{client}', [ClientController::class, 'update'])->name('clients.update');
    Route::delete('clients/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');

    Route::post('clients/{client}/notes', [NoteController::class, 'store'])->name('notes.store');
    Route::get('notes/{note}/edit', [NoteController::class, 'edit'])->name('notes.edit');
    Route::put('notes/{note}', [NoteController::class, 'update'])->name('notes.update');
    Route::delete('notes/{note}', [NoteController::class, 'destroy'])->name('notes.destroy');
});
