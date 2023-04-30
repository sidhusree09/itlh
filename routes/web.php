<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\ProfileController;

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

Route::get('/',[ServiceController::class, 'all']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//services
Route::get('/services/all', [ServiceController::class, 'all'])->name('services.all');
Route::middleware(['auth.module'])->group(function () {
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/create', [ServiceController::class, 'create'])->name('services.create');
Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
Route::get('/services/{service}/edit', [ServiceController::class, 'edit'])->name('services.edit');
Route::put('/services/{service}', [ServiceController::class, 'update'])->name('services.update');
Route::get('/services/show/{service}', [ServiceController::class, 'show'])->name('services.show');
Route::delete('/services/{service}', [ServiceController::class, 'destroy'])->name('services.destroy');
});

//category
Route::middleware(['auth.module'])->group(function () {
Route::get('/categories', [CategoryController::class,'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class,'create'])->name('categories.create');
Route::post('/categories', [CategoryController::class,'store'])->name('categories.store');
Route::get('/categories/{id}', [CategoryController::class,'show'])->name('categories.show');
Route::get('/categories/{id}/edit', [CategoryController::class,'edit'])->name('categories.edit');
Route::put('/categories/{id}', [CategoryController::class,'update'])->name('categories.update');
Route::delete('/categories/{id}', [CategoryController::class,'destroy'])->name('categories.destroy');
});

//Booking
Route::middleware(['auth.module'])->group(function () {
    Route::get('/bookings', [BookingController::class,'index'])->name('bookings.index');
    Route::get('/bookings/create', [BookingController::class,'create'])->name('bookings.create');
    Route::post('/bookings/ajaxStore', [BookingController::class,'ajaxStore'])->name('bookings.ajaxStore');
    Route::post('/bookings', [BookingController::class,'store'])->name('bookings.store');
    Route::get('/bookings/{id}', [BookingController::class,'show'])->name('bookings.show');
    Route::get('/bookings/{id}/edit', [BookingController::class,'edit'])->name('bookings.edit');
    Route::put('/bookings/{id}', [BookingController::class,'update'])->name('bookings.update');
    Route::delete('/bookings/{id}', [BookingController::class,'destroy'])->name('bookings.destroy');
    Route::post('/bookings/cancel', [BookingController::class,'cancel'])->name('bookings.cancel');
});


//Schedule
Route::group(['prefix' => 'schedule'], function () {
    // show all schedules
    Route::get('/', [ScheduleController::class,'index'])->name('schedule.index');
    
    // create a new schedule
    Route::get('/create', [ScheduleController::class,'create'])->name('schedule.create');
    Route::post('/store', [ScheduleController::class,'store'])->name('schedule.store');
    Route::post('/ajaxStore', [ScheduleController::class,'ajaxStore'])->name('schedule.ajaxStore');
    
    // show a single schedule
    Route::get('/{schedule}', [ScheduleController::class,'show'])->name('schedule.show');
    
    // edit a schedule
    Route::get('/{schedule}/edit', [ScheduleController::class,'edit'])->name('schedule.edit');
    Route::put('/{schedule}', [ScheduleController::class,'update'])->name('schedule.update');
    
    // delete a schedule
    Route::delete('/{schedule}', [ScheduleController::class,'destroy'])->name('schedule.destroy');
});

Route::prefix('profile')->group(function () {
    Route::get('/', [ProfileController::class,'index'])->name('profile.index');
    Route::get('/show', [ProfileController::class,'show'])->name('profile.show');
    Route::get('/create', [ProfileController::class,'create'])->name('profile.create');
    Route::post('/', [ProfileController::class,'store'])->name('profile.store');
    Route::get('/edit/{id}', [ProfileController::class,'edit'])->name('profile.edit');
    Route::put('/{id}', [ProfileController::class,'update'])->name('profile.update');
    Route::delete('/{id}', [ProfileController::class,'destroy'])->name('profile.destroy');
});


