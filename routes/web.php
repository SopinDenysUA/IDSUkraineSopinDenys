<?php

use App\Http\Controllers\WaitlistEmbedController;
use App\Livewire\WaitlistForm;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

Route::get('/waitlist/create', WaitlistForm::class)->name('waitlist.create');

Route::get('/waitlist/embed/{uuid}', [WaitlistEmbedController::class, 'embed'])->name('waitlist.embed');
