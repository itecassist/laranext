<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrganisationController;
use App\Http\Controllers\Auth\ProviderController;


Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('organisations', [OrganisationController::class, 'index'])->name('organisations');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('organisations/create', App\Livewire\Organisation\Create::class)->name('organisations.create');
});

/** socialite */
Route::get('/auth/{provider}/redirect', [ProviderController::class, 'redirect']);
Route::get('/auth/{provider}/callback', [ProviderController::class, 'callback']);
