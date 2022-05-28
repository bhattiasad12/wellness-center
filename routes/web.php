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
use App\Http\Controllers\ClientNoteController;
use App\Http\Controllers\SettingsController;


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

// Route::get('/', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

/// appointment Controller
Route::middleware(['auth'])->group(function () {
    Route::Get('/', [AppointmentController::class, 'dashboard'])->name('dashboard');
    Route::resource('appointment', AppointmentController::class);
    Route::Get('client_info', [AppointmentController::class, 'clientInfo'])->name('client_info');
    Route::Get('room_practitioner', [AppointmentController::class, 'getRoomPractitioner'])->name('room_practitioner');
    Route::Get('machine_hand', [AppointmentController::class, 'getMachineHand'])->name('machine_hand');
    Route::Get('hand_service_setting', [AppointmentController::class, 'getHandServiceSetting'])->name('hand_service_setting');
    Route::Get('check_appointment', [AppointmentController::class, 'checkAppointment'])->name('check_appointment');
    Route::POST('add_payment', [AppointmentController::class, 'paymentStore'])->name('add_payment');
    Route::GET('appointment_calender', [AppointmentController::class, 'showCalender'])->name('appointment_calender');
});
/// appointment Controller end

/// client Controller
Route::middleware(['auth'])->group(function () {
    Route::resource('client', ClientController::class);
    Route::Get('createDocumnet', [ClientController::class, 'createDocumnet'])->name('create_documnet');
    Route::POST('storeDocument', [ClientController::class, 'storeDocument'])->name('store_document');
});
/// client Controller End

Route::middleware(['auth'])->group(function () {
    Route::resource('client_note', ClientNoteController::class);
    Route::resource('machine', MachineController::class);
    Route::resource('hand', HandController::class);
    Route::resource('hand_setting', HandSettingController::class);
});

/// service Controller
Route::middleware(['auth'])->group(function () {
    Route::resource('service', ServiceController::class);
    Route::Get('getMachineHand', [ServiceController::class, 'getMachineHand'])->name('machine_hand');
});


/// service Controller End
Route::middleware(['auth'])->group(function () {
    Route::resource('room', RoomController::class);
    Route::resource('practitioner', PractitionerController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::resource('settings', SettingsController::class);
    Route::post('/settings/{id}/updateEmail', [SettingsController::class, 'updateEmail'])->name('updateEmail');
    Route::post('/settings/{id}/updatePassword', [SettingsController::class, 'updatePassword'])->name('updatePassword');
});
