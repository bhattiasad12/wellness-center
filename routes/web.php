<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\PractitionerController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\HandController;
use App\Http\Controllers\HandSettingController;

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

Route::resource('appointment', AppointmentController::class)->middleware(['auth']);;
Route::resource('client', ClientController::class)->middleware(['auth']);;
Route::resource('machine', MachineController::class)->middleware(['auth']);;
Route::resource('hand', HandController::class)->middleware(['auth']);;
Route::resource('hand_setting', HandSettingController::class)->middleware(['auth']);;
Route::resource('service', ServiceController::class)->middleware(['auth']);;
Route::resource('room', RoomController::class)->middleware(['auth']);;
Route::resource('practitioner', PractitionerController::class)->middleware(['auth']);;

// ->middleware(['auth'])
require __DIR__ . '/auth.php';

// Route::get('/photos/popular', [SettingsController::class, 'upload']);
// Route::post('/settings/{email}/updateEmail', 'SettingsController@updateEmail');

Route::post('/settings/{id}/updateEmail', [App\Http\Controllers\SettingsController::class, 'updateEmail'])->name('updateEmail')->middleware(['auth']);
Route::post('/settings/{id}/updatePassword', [App\Http\Controllers\SettingsController::class, 'updatePassword'])->name('updatePassword')->middleware(['auth']);
Route::resource('settings', App\Http\Controllers\SettingsController::class)->middleware(['auth']);
