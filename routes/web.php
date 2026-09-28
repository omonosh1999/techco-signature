<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/', 'pages::home')->name('home');

Route::livewire('join/job-seeker', 'pages::join.start')
    ->defaults('path', 'candidate')
    ->name('join.candidate');

Route::livewire('join/agent', 'pages::join.start')
    ->defaults('path', 'agent')
    ->name('join.agent');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
