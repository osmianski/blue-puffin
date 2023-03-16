<?php

use App\Http\Livewire\LoginPage;
use App\Http\Livewire\ContentPage;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', LoginPage::class)
    ->name('login');

// content pages
Route::get('/', ContentPage::class);
Route::get('{slug:slug}', ContentPage::class)
    ->where('slug', '([A-Za-z0-9\-\/]+)');
