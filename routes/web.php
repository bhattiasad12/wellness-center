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
Route::Get('/', [AppointmentController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');

Route::resource('appointment', AppointmentController::class)->middleware(['auth']);
Route::Get('client_info', [AppointmentController::class, 'clientInfo'])->middleware(['auth'])->name('client_info');
Route::Get('room_practitioner', [AppointmentController::class, 'getRoomPractitioner'])->middleware(['auth'])->name('room_practitioner');
Route::Get('machine_hand', [AppointmentController::class, 'getMachineHand'])->middleware(['auth'])->name('machine_hand');
Route::Get('hand_service_setting', [AppointmentController::class, 'getHandServiceSetting'])->middleware(['auth'])->name('hand_service_setting');
Route::Get('check_appointment', [AppointmentController::class, 'checkAppointment'])->middleware(['auth'])->name('check_appointment');
Route::POST('add_payment', [AppointmentController::class, 'paymentStore'])->middleware(['auth'])->name('add_payment');
Route::GET('appointment_calender', [AppointmentController::class, 'showCalender'])->middleware(['auth'])->name('appointment_calender');


/// appointment Controller end
/// client Controller
Route::resource('client', ClientController::class)->middleware(['auth']);
Route::Get('createDocumnet', [ClientController::class, 'createDocumnet'])->middleware(['auth'])->name('create_documnet');
Route::POST('storeDocument', [ClientController::class, 'storeDocument'])->middleware(['auth'])->name('store_document');

/// client Controller End
Route::resource('client_note', ClientNoteController::class)->middleware(['auth']);
Route::resource('machine', MachineController::class)->middleware(['auth']);
Route::resource('hand', HandController::class)->middleware(['auth']);
Route::resource('hand_setting', HandSettingController::class)->middleware(['auth']);

/// service Controller
Route::resource('service', ServiceController::class)->middleware(['auth']);
Route::Get('getMachineHand', [ServiceController::class, 'getMachineHand'])->middleware(['auth'])->name('machine_hand');

/// service Controller End
Route::resource('room', RoomController::class)->middleware(['auth']);
Route::resource('practitioner', PractitionerController::class)->middleware(['auth']);

Route::resource('settings', App\Http\Controllers\SettingsController::class);
Route::post('/settings/{id}/updateEmail', [App\Http\Controllers\SettingsController::class, 'updateEmail'])->name('updateEmail')->middleware(['auth']);
Route::post('/settings/{id}/updatePassword', [App\Http\Controllers\SettingsController::class, 'updatePassword'])->name('updatePassword')->middleware(['auth']);
