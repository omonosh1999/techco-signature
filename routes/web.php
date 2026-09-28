<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/', 'pages::home')->name('home');
Route::livewire('recruitment', 'pages::recruitment')->name('recruitment');
Route::livewire('branding-school', 'pages::school')->name('school');

// One registration component, four doors into it.
$joinPaths = [
    'join/job-seeker' => ['candidate', 'join.candidate'],
    'join/agent' => ['agent', 'join.agent'],
    'join/employer' => ['employer', 'join.employer'],
    'join/student' => ['student', 'join.student'],
];

foreach ($joinPaths as $uri => [$path, $name]) {
    Route::livewire($uri, 'pages::join.start')->defaults('path', $path)->name($name);
}

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
