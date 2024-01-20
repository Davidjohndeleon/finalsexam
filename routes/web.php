<?php

use App\Http\Controllers\EventController;
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

Route::get('/',[EventController::class,'index'])->name('event');
Route::post('/save-events',[EventController::class, 'save_events'])->name('saveEvents');
Route::get('/delete-events/{id}', [EventController::class, 'delete_events'])->name('removeEvents');
Route::get('/update-events/{id}', [EventController::class, 'update_events'])->name('updateEvents');
Route::post('/save-updated-events', [EventController::class, 'save_updated_events'])->name('saveUpdatedEvents');


