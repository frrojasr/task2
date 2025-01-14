<?php

use App\Livewire\Approvals;
use Illuminate\Support\Facades\Route;
use App\Livewire\Products;
use App\Http\Controllers\SendNotifyController;

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

Route::get('/', function () {
    return redirect('/products');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/products', Products::class)->name('products');
    Route::get('/approvals', Approvals::class)->name('approvals');

    Route::get('sendnotify', [SendNotifyController::class, 'index']);
});
