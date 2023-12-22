<?php

use App\Livewire\Users;
use App\Livewire\Products;
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

Route::view('/', 'welcome');

Route::group(['middleware' => 'auth'], function () {

    Route::view('dashboard', 'dashboard')
        ->middleware(['verified'])
        ->name('dashboard');

    Route::view('profile', 'profile')->name('profile');

    Route::get('/users', Users\Index::class)
        ->middleware(['role:admin'])
        ->name('users.index');
    Route::get('/products', Products\Index::class)
        ->middleware(['role:admin'])
        ->name('products.index');
});


require __DIR__ . '/auth.php';
