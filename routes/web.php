<?php

use Illuminate\Support\Facades\Route;

Use App\Http\Controllers\MerekController;

Use App\Http\Controllers\DistributorController;

Use App\Http\Controllers\BarangController;

Use App\Http\Controllers\TransaksiController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('homes', function () {
    return view('homes');
});
    

require __DIR__.'/auth.php';

Route::resource('mereks', MerekController::class);

Route::resource('distributors', DistributorController::class);

Route::resource('barangs', BarangController::class);

Route::resource('transaksis', TransaksiController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
