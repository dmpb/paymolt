<?php

use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PaymentLinkController;
use App\Models\PaymentLink;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('welcome');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::middleware(['auth', 'credentials'])->group(function () {
    Route::get('payments', [PaymentController::class, 'index'])->name('payments.index');
    Route::get('payments/{payment}', [PaymentController::class, 'show'])->name('payments.show');
});

Route::middleware(['auth'])->group(function () {
    Route::get('payment-links', [PaymentLinkController::class, 'index'])->name('payment-links.index');
    Route::get('payment-links/{paymentLink:code}/edit', [PaymentLinkController::class, 'edit'])->name('payment-links.edit');
    Route::put('payment-links/{paymentLink:code}', [PaymentLinkController::class, 'update'])->name('payment-links.update');
});
