<?php

use App\Http\Middleware\isAdmin;
use App\Livewire\Home;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/home', Home::class)->name('home');
    Route::get('/modal', Home::class)->name('modal');

});

//Para admins
Route::get('index', function () {
    return view('proyecto.index');
})->middleware(isAdmin::class)->name('index');