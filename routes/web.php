<?php

use App\Http\Controllers\TicketController;
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

Route::get('/tickets', [TicketController::class, 'index'])->name('ticket.all');
Route::get('/ticket/{id}', [TicketController::class, 'show'])->name('ticket.show');
Route::get('/create', [TicketController::class, 'create'])->name('ticket.create');
Route::post('/store', [TicketController::class, 'store'])->name('ticket.store');
Route::get('/edit/{id}', [TicketController::class, 'edit'])->name('ticket.edit');
Route::put('/update/{id}', [TicketController::class, 'update'])->name('ticket.update');
