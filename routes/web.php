<?php

use App\Http\Controllers\WaitlistController;
use App\Http\Controllers\WaitlistEmbedController;
use App\Http\Controllers\Waitlist\WaitlistPublicController;
/*use App\Livewire\WaitlistAdmin;*/
use App\Livewire\WaitlistForm;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::redirect('/dashboard', 'waitlists', 301)
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

/*Route::get('/waitlist', WaitlistAdmin::class)->name('waitlist.index')->middleware(['auth']);*/
Route::get('/waitlist/create', WaitlistForm::class)->name('waitlist.create')->middleware(['auth']);

Route::get('/waitlist/embed/{uuid}', [WaitlistEmbedController::class, 'embed'])->name('waitlist.embed')->middleware(['auth']);

Route::middleware('auth')->group(function () {
    Route::post('/waitlists/{waitlist}/toggle-access', [WaitlistController::class, 'toggleAccess'])->name('waitlists.toggle-access');
    Route::resource('waitlists', WaitlistController::class);
});

Route::get('/waitlist/{link}', [WaitlistPublicController::class, 'show'])->name('waitlist.public');
