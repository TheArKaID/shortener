<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', App\Http\Livewire\Front::class)->name('home');

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', App\Http\Livewire\Dashboard\Home::class)->name('dashboard.home');
    Route::get('/link', App\Http\Livewire\Dashboard\UserLink::class)->name('dashboard.link');
    Route::get('/link/{id}', App\Http\Livewire\Dashboard\EditLink::class)->name('dashboard.edit-link');
    Route::get('/profile', App\Http\Livewire\Dashboard\Profile::class)->name('dashboard.profile');
});

Route::get('/{short_url}', [App\Http\Controllers\RedirectController::class, 'index'])->name('goto');
