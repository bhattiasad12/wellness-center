<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\PractitionerController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AppointmentController;

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

require __DIR__ . '/auth.php';

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


require __DIR__ . '/auth.php';

Route::resource('appointment', AppointmentController::class);
Route::resource('client', ClientController::class);
Route::resource('machine', MachineController::class);
Route::resource('service', ServiceController::class);
Route::resource('room', RoomController::class);
Route::resource('practitioner', PractitionerController::class);
Route::post('/settings/{id}/updateEmail', [App\Http\Controllers\SettingsController::class, 'updateEmail'])->name('updateEmail');
Route::post('/settings/{id}/updatePassword', [App\Http\Controllers\SettingsController::class, 'updatePassword'])->name('updatePassword');
Route::resource('settings', App\Http\Controllers\SettingsController::class);
