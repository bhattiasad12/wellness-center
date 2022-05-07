<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Client;
use App\Models\Room;
use App\Models\Machine;
use App\Models\Hand;
use App\Models\Service;
use App\Models\HandSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class AppointmentController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $userId = Auth::user()->id;
    $appointment = DB::select(DB::raw("SELECT 
        a.`id` AS appointment_id,
        a.`appointment_start`,
        c.`first_name` AS client_first_name,
        c.`last_name` AS client_last_name,
        c.`phone_number`,
        m.`name` AS machine_name,
        s.`service_name`,
        h.`name` AS hand_name,
        a.`zone`,
        a.`session`,
        a.`session_price`,
        a.`total_service_amount`,
        a.`appointment_end`,
        a.`room_time`, r.`name` AS room_name,
        p.`first_name` AS pra_first_name,
        p.`last_name` AS pra_last_name,
        hs.`setting_name`,a.`status`,
        a.`note`,a.`created_at`,a.`unpaid`,a.`paid`
      FROM
        `appointments` a 
        INNER JOIN `clients` c 
          ON a.`client_id` = c.`id` 
        INNER JOIN `machines` m 
          ON m.`id` = a.`machine_id` 
        INNER JOIN `services` s 
          ON s.id = a.`service_id` 
        INNER JOIN `hands` h 
          ON h.`id` = a.`hand_id` 
        INNER JOIN `practitioners` p 
          ON p.`id` = a.`practitionner_id` 
        INNER JOIN `hand_settings` hs 
          ON hs.`id` = a.`setting_id` 
        INNER JOIN `rooms` r 
          ON a.`room_id` = r.`id` 
      WHERE a.`user_id` = '$userId' 
        AND a.`deleted_at` IS NULL "));

    return view('appointment.index', compact('appointment'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $machine = Machine::where('user_id', Auth::user()->id)->get();
    $client = Client::where('user_id', Auth::user()->id)->get();
    return view('appointment.create', compact('client', 'machine'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $request->validate([
      'client_id' => ['required'],
      'appointment_end' => ['required'],
      'appointment_start' => ['required'],
      'room_id' => ['required'],
      'practitionner_id' => ['required'],
      'machine_id' => ['required'],
      'hand_id' => ['required'],
      'service_id' => ['required'],
      'zone' => ['required'],
      'session' => ['required'],
      'setting_id' => ['required'],
      'session_price' => ['required'],
      'promotion' => ['required'],
      'total_service_amount' => ['required'],
      'room_time' => ['required'],
      'check_in' => ['required'],
      'check_out' => ['required'],
      'status' => ['required'],
      'note' => ['required'],

    ]);
    // DB::enableQueryLog();
    $data = Appointment::create([
      'client_id' => $request->client_id,
      'appointment_end' => $request->appointment_end,
      'appointment_start' => $request->appointment_start,
      'room_id' => $request->room_id,
      'practitionner_id' => $request->practitionner_id,
      'machine_id' => $request->machine_id,
      'hand_id' => $request->hand_id,
      'service_id' => $request->service_id,
      'zone' => $request->zone,
      'session' => $request->session,
      'setting_id' => $request->setting_id,
      'session_price' => $request->session_price,
      'promotion' => $request->promotion,
      'total_service_amount' => $request->total_service_amount,
      'unpaid' => $request->total_service_amount,
      'room_time' => $request->room_time,
      'check_in' => $request->check_in,
      'check_out' => $request->check_out,
      'status' => $request->status,
      'note' => $request->note,
      'user_id' => Auth::user()->id,
      'created_at' => date("Y-m-d"),
      'created_by' => Auth::user()->id,
    ]);
    return redirect()->back();
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\appointment  $appointment
   * @return \Illuminate\Http\Response
   */
  public function show(appointment $appointment)
  {
    $userId = Auth::user()->id;
    $appointmentId = $appointment->id;
    $appointment = DB::select(DB::raw("SELECT 
        a.`id` AS appointment_id,
        a.`appointment_start`,
        c.`first_name` AS client_first_name,
        c.`last_name` AS client_last_name,
        c.`phone_number`,
        m.`name` AS machine_name,
        s.`service_name`,
        h.`name` AS hand_name,
        a.`zone`,
        a.`session`,
        a.`session_price`,
        a.`total_service_amount`,
        a.`appointment_end`,
        a.`room_time`, r.`name` AS room_name,
        p.`first_name` AS pra_first_name,
        p.`last_name` AS pra_last_name,
        hs.`setting_name`,a.`status`,
        a.`note`,a.`created_at`,a.`unpaid`,a.`paid`,a.`promotion`
      FROM
        `appointments` a 
        INNER JOIN `clients` c 
          ON a.`client_id` = c.`id` 
        INNER JOIN `machines` m 
          ON m.`id` = a.`machine_id` 
        INNER JOIN `services` s 
          ON s.id = a.`service_id` 
        INNER JOIN `hands` h 
          ON h.`id` = a.`hand_id` 
        INNER JOIN `practitioners` p 
          ON p.`id` = a.`practitionner_id` 
        INNER JOIN `hand_settings` hs 
          ON hs.`id` = a.`setting_id` 
        INNER JOIN `rooms` r 
          ON a.`room_id` = r.`id` 
      WHERE a.`user_id` = '$userId' 
        AND a.`deleted_at` IS NULL AND a.`id`='$appointmentId' "));

    $paymentHistory = DB::select(DB::raw("SELECT 
        * FROM appointment_payments 
      WHERE `user_id` = '$userId' 
        AND `deleted_at` IS NULL AND appointment_id='$appointmentId'"));
    return view('appointment.show', compact('appointment', 'paymentHistory'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\appointment  $appointment
   * @return \Illuminate\Http\Response
   */
  public function edit(appointment $appointment)
  {
    return view('appointment.edit', $appointment);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\appointment  $appointment
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, appointment $appointment)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\appointment  $appointment
   * @return \Illuminate\Http\Response
   */
  public function destroy(int $id)
  {
    $data = Appointment::find($id);
    $data->delete();
    return redirect()->back();
  }
  public function clientInfo()
  {
    $userId = Auth::user()->id;

    $clientId = $_REQUEST['clientId'];

    return DB::select(DB::raw("SELECT email,phone_number FROM clients where id='$clientId' AND user_id='$userId' "));
  }
  public function getRoomPractitioner()
  {
    $userId = Auth::user()->id;
    $appointmentStart = $_REQUEST['appointmentStart'];

    $time = date("H:i", strtotime($appointmentStart));
    $appointmentStart = date("Y-m-d H:i", strtotime($appointmentStart));
    $day = strtolower(date('l', strtotime($appointmentStart)));
    $appointmentArr = DB::select(DB::raw("SELECT  GROUP_CONCAT(room_id)AS room_id, GROUP_CONCAT(practitionner_id) AS practitionner_id
        FROM appointments WHERE `user_id` = '$userId' AND `deleted_at` IS NULL 
        AND STR_TO_DATE(`appointment_start`, '%Y-%m-%d %H:%i') <= '$appointmentStart' 
        AND STR_TO_DATE(`appointment_end`, '%Y-%m-%d %H:%i') >= '$appointmentStart'"));
    if ($appointmentArr[0]->room_id == '') {
      $room = Room::where('user_id', $userId)->get();
      $practitioners = DB::select(DB::raw("SELECT p.`id`,p.`first_name` FROM `practitioners` p INNER JOIN `practitioners_time` pt 
              ON p.`id` = pt.`practitioner_id` 
            INNER JOIN `practitioners_days` pd 
              ON pd.`id` = pt.`practitioner_day_id` 
          WHERE pd.`day` = '$day' AND p.`deleted_at` IS NULL
            AND STR_TO_DATE(pt.`start_time`, '%H:%i:%s') <= '$time' AND STR_TO_DATE(pt.`end_time`, '%H:%i:%s') >= '$time'"));
      $dataArr = array('room' => $room, 'practitioners' => $practitioners);
      return  $dataArr;
    }
    if ($appointmentArr[0]->room_id != "") {
      // Log::info('Showing the user profile for user: ' . print_r($appointmentArr, true));
      //DB::connection()->enableQueryLog();
      $roomId = $appointmentArr[0]->room_id;
      $practitionerId = $appointmentArr[0]->practitionner_id;
      $room = DB::select(DB::raw("SELECT  *  FROM rooms WHERE `user_id` = '$userId' AND `deleted_at` IS NULL 
            AND `id` NOT IN ($roomId)"));
      // Log::info('Showing the user profile for user: ' . print_r($room, true));
      //  $room = Room::where('user_id', $userId)->where('id', 'NOT IN', $appointmentArr[0]->room_id)->get();
      // $room = DB::getQueryLog();

      $practitioners = DB::select(DB::raw("SELECT p.`id`,p.`first_name` FROM `practitioners` p INNER JOIN `practitioners_time` pt 
              ON p.`id` = pt.`practitioner_id` 
            INNER JOIN `practitioners_days` pd 
              ON pd.`id` = pt.`practitioner_day_id` 
          WHERE pd.`day` = '$day' AND p.`deleted_at` IS NULL AND p.`id` NOT IN ($practitionerId)
            AND STR_TO_DATE(pt.`start_time`, '%H:%i:%s') <= '$time' AND STR_TO_DATE(pt.`end_time`, '%H:%i:%s') >= '$time'"));
      $dataArr = array('room' => $room, 'practitioners' => $practitioners);
      return  $dataArr;
    }
  }
  public function getMachineHand()
  {
    $userId = Auth::user()->id;
    $machineId = $_REQUEST['machineId'];
    $hand = Hand::where('user_id', $userId)->where('machine_id', $machineId)->get();
    return  $hand;
  }
  public function getHandServiceSetting()
  {
    $userId = Auth::user()->id;
    $machineId = $_REQUEST['machineId'];
    $handId = $_REQUEST['handId'];
    $service = Service::where('user_id', $userId)->where('machine_id', $machineId)->where('hand_id', $handId)->get();
    $handSetting = HandSetting::where('user_id', $userId)->where('machine_id', $machineId)->where('hand_id', $handId)->get();
    $dataArr = array('service' => $service, 'handSetting' => $handSetting);
    return  $dataArr;
  }
  public function checkAppointment()
  {
    $userId = Auth::user()->id;
    $serviceId = $_REQUEST['serviceId'];
    $practitionnerId = $_REQUEST['practitionnerId'];
    // $appointmentStartTime = date('Y-m-d H:i', strtotime($_REQUEST['appointmentStart']));
    $checkIn = date('H:i', strtotime($_REQUEST['appointmentStart']));
    //$appointmentTime = $_REQUEST['appointmentStart'];
    $service = Service::where('user_id', $userId)->where('id', $serviceId)->get();
    $minutes = "+" . $service[0]->time_limit . "minutes";
    $appointmentEndTime = date('Y-m-d H:i', strtotime($minutes, strtotime($_REQUEST['appointmentStart'])));
    $checkOut = date('H:i', strtotime($appointmentEndTime));
    $appointmentArr = DB::select(DB::raw("SELECT * FROM appointments WHERE `user_id` = '$userId' AND `deleted_at` IS NULL 
        AND `practitionner_id` = '$practitionnerId' 
        AND ('$appointmentEndTime' BETWEEN STR_TO_DATE(`appointment_start`, '%Y-%m-%d %H:%i:%s') AND STR_TO_DATE(`appointment_end`,
        '%Y-%m-%d %H:%i:%s')) "));
    if (empty($appointmentArr)) {
      $data = array(
        'checkIn' => $checkIn,
        'checkOut' => $checkOut,
        'service' => $service,
        'appointmentEndTime' => $appointmentEndTime,
        'hasAppointment' => 'no',
      );
    }
    if (!empty($appointmentArr)) {
      $data = array(
        'hasAppointment' => 'yes',
      );
    }

    //Log::info('Showing the user profile for user: ' . print_r($appointmentArr, true));

    return $data;
  }
  public function paymentStore(Request $request)
  {
    $userId = Auth::user()->id;
    $appointmentId = $request->appointment_id;
    $unpaid = $request->unpaid - $request->paid;
    DB::table('appointment_payments')
      ->insert([
        'appointment_id' => $appointmentId,
        'payment_method'  => $request->payment_method,
        'paid'  => $request->paid,
        'unpaid'  => $unpaid,
        'payment_date'  => Date("Y-m-d"),
        'user_id'  => $userId,
        'created_by'  => $userId,
        'created_at'  => Date("Y-m-d H:i"),
      ]);

    $paidAmount = DB::select(DB::raw("SELECT SUM(paid) AS paid FROM `appointment_payments` WHERE user_id='$userId' AND appointment_id='$appointmentId'"));
    $appointment = Appointment::find($appointmentId);

    $appointment->paid = $paidAmount[0]->paid;
    $appointment->unpaid = $unpaid;
    $appointment->updated_at =  date("Y-m-d");
    $appointment->updated_by =  Auth::user()->id;

    $appointment->save();
    return redirect()->back();
  }
  public function showCalender()
  {
    return view('appointment.calender');
  }
}
