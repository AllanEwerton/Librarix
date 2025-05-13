<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::view('aluno','aluno')
->middleware(['auth'])
->name('aluno');

Route::view('autor', 'autor')
->middleware(['auth'])
->name('autor');

Route::view('livro', 'livro')
->middleware(['auth'])
->name('livro');

Route::view('classe', 'classe')
->middleware(['auth'])
->name('classe');

require __DIR__.'/auth.php';
