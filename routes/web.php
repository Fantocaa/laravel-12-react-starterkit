<?php

use App\Http\Controllers\PaymentsController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('welcome');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
    Route::get('dashboard/payments', [PaymentsController::class, 'index'])->name('payments');
    Route::get('dashboard/payments/new', [PaymentsController::class, 'create'])->name('payments.new');
    Route::post('dashboard/payments/store', [PaymentsController::class, 'store'])->name('payments.store');
    Route::get('dashboard/payments/edit/{id}', [PaymentsController::class, 'edit'])->name('payments.edit');
    Route::put('dashboard/payments/update/{id}', [PaymentsController::class, 'update'])->name('payments.update');
    Route::delete('dashboard/payments/delete/{id}', [PaymentsController::class, 'destroy'])->name('payments.delete');
});

require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
