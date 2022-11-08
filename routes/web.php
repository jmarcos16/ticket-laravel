<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;

Route::prefix('ticket')->group(function () {
  Route::get('/all', [TicketController::class, 'index'])->name('ticket.all');
  Route::get('/show/{id}', [TicketController::class, 'show'])->name('ticket.show');
  Route::get('/create', [TicketController::class, 'create'])->name('ticket.create');
  Route::post('/store', [TicketController::class, 'store'])->name('ticket.store');
  Route::get('/edit/{id}', [TicketController::class, 'edit'])->name('ticket.edit');
  Route::put('/update/{id}', [TicketController::class, 'update'])->name('ticket.update');
});

Route::prefix('user')->group(function () {
  Route::get('/dashboard', [UserController::class, 'index'])->name('user.dash');
  Route::get('/create', [UserController::class, 'create'])->name('user.create');
  Route::post('/store', [UserController::class, 'store'])->name('user.store');
});
