<?php

use App\Http\Middleware\isAdmin;
use App\Livewire\Explore;
use App\Livewire\Home;
use Illuminate\Support\Facades\Route;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Redirigir a /home si el usuario está autenticado
    Route::redirect('/', '/home');
    Route::get('/home', Home::class)->name('home');
});

// Redirigir a /explore si el usuario no está autenticado
Route::get('/', function () {
    return redirect('/explore');
})->middleware('guest');

// Ruta de exploración
Route::get('/explore', Explore::class)->name('explore');

// Ruta para administradores
Route::get('index', function () {
    return view('proyecto.index');
})->middleware(isAdmin::class)->name('index');