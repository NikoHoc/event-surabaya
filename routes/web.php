<?php

use App\Http\Controllers\EventCategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\OrganizerController;
use App\Models\EventCategory;
use App\Models\Organizer;
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

Route::get('/', [EventController::class, 'index'])->name('events/index');

Route::resource('events', EventController::class);

Route::get('master/event', [EventController::class, 'indexMaster'])->name('master.event.index');
Route::resource('master/event_category', EventCategoryController::class);
Route::resource('master/organizer', OrganizerController::class);
