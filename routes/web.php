<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TimeLineController;

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

//Authenticated routes=================================================================================================
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [TimeLineController::class, 'index']);
    Route::get('/', [TimeLineController::class, 'index'])->name('home');

    //create
    Route::get('/create', [TimeLineController::class, 'create'])->name('create');
    //save timeline
    Route::post('timeline-save', [TimeLineController::class, 'saveTimeLine']);
    //get events
    Route::get('timeline/view/{id}', [EventController::class, 'getEvent']);
    //save events
    Route::post('events-save', [EventController::class, 'saveEvent']);
    //save child events
    Route::post('child-events-save', [EventController::class, 'saveChildEvent']);
    //save sibling events
    Route::post('sibling-events-save', [EventController::class, 'saveSiblingEvent']);
    //delete event
    Route::post('events-delete', [EventController::class, 'deleteEvent']);
    //update event name
    Route::post('events-update', [EventController::class, 'updateEvent']);
});

// without atuhenticated routes here=====================================================================================
//join time line
Route::get('timeline/join', [TimeLineController::class, 'joinTimeLine']);
//invite event
Route::post('invite/event', [EventController::class, 'InviteEvent']);
//join event
Route::get('event/join', [EventController::class, 'JoinEvent']);

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
