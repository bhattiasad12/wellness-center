<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Client;
use App\Models\Room;
use App\Models\Machine;
use App\Models\Hand;
use App\Models\Service;
use App\Models\HandSetting;
use App\Models\ServiceZone;
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
    $year = Date("Y");
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
        AND a.`deleted_at` IS NULL AND YEAR(a.`created_at`)='$year' "));

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
      'zone' => implode(',', $request->zone),
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

    $zones = $appointment[0]->zone;
    $zone = DB::select(DB::raw("SELECT 
        GROUP_CONCAT(zone) AS zone FROM service_zones 
      WHERE `user_id` = '$userId' 
        AND `deleted_at` IS NULL AND id in ($zones)"));
    return view('appointment.show', compact('appointment', 'paymentHistory', 'zone'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\appointment  $appointment
   * @return \Illuminate\Http\Response
   */
  public function edit(appointment $appointment)
  {
    $machine = Machine::where('user_id', Auth::user()->id)->get();
    $client = Client::where('user_id', Auth::user()->id)->get();
    return view('appointment.edit', compact('client', 'machine', 'appointment'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\appointment  $appointment
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, int $id)
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
    $appointment = Appointment::find($id);

    $appointment->client_id = $request->client_id;
    $appointment->appointment_end = $request->appointment_end;
    $appointment->appointment_start = $request->appointment_start;
    $appointment->room_id = $request->room_id;
    $appointment->practitionner_id = $request->practitionner_id;
    $appointment->machine_id = $request->machine_id;
    $appointment->hand_id = $request->hand_id;
    $appointment->service_id = $request->service_id;
    $appointment->zone = implode(',', $request->zone);
    $appointment->session = $request->session;
    $appointment->session_price = $request->session_price;
    $appointment->promotion = $request->promotion;
    $appointment->total_service_amount = $request->total_service_amount;
    $appointment->unpaid = $request->total_service_amount;
    $appointment->room_time = $request->room_time;
    $appointment->check_in = $request->check_in;
    $appointment->check_out = $request->check_out;
    $appointment->status = $request->status;
    $appointment->note = $request->note;
    $appointment->updated_at =  date("Y-m-d");
    $appointment->updated_by =  Auth::user()->id;

    $appointment->save();
    return redirect()->back();
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
    $appointmentId = $_REQUEST['appointmentId'];

    $time = date("H:i", strtotime($appointmentStart));
    $appointmentStart = date("Y-m-d H:i", strtotime($appointmentStart));
    $day = strtolower(date('l', strtotime($appointmentStart)));
    $appointmentArr = DB::select(DB::raw("SELECT  GROUP_CONCAT(room_id)AS room_id, GROUP_CONCAT(practitionner_id) AS practitionner_id
        FROM appointments WHERE `user_id` = '$userId' AND `deleted_at` IS NULL 
        AND STR_TO_DATE(`appointment_start`, '%Y-%m-%d %H:%i') <= '$appointmentStart' 
        AND STR_TO_DATE(`appointment_end`, '%Y-%m-%d %H:%i') >= '$appointmentStart' AND id NOT IN ('$appointmentId') "));
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
  public function getZone()
  {
    $userId = Auth::user()->id;
    $serviceId = $_REQUEST['serviceId'];
    $serviceZone = ServiceZone::where('user_id', $userId)->where('service_id', $serviceId)->get();
    return $serviceZone;
  }
  public function checkAppointment()
  {
    $userId = Auth::user()->id;
    $zoneId = $_REQUEST['zoneId'];
    // $zoneId = implode(',', $zoneId);
    $practitionnerId = $_REQUEST['practitionnerId'];
    $appointmentId = $_REQUEST['appointmentId'];
    // $appointmentStartTime = date('Y-m-d H:i', strtotime($_REQUEST['appointmentStart']));
    $checkIn = date('H:i', strtotime($_REQUEST['appointmentStart']));
    //$appointmentTime = $_REQUEST['appointmentStart'];
    $service = ServiceZone::select(DB::raw("SUM(time_limit) as time_limit"), DB::raw("SUM(price)*`session` as price"), DB::raw("SUM(session) as session"))
      ->where('user_id', $userId)->wherein('id', $zoneId)->get();

    //  Log::info('Showing the user profile for user: ' . print_r($service, true));
    $minutes = "+" . $service[0]->time_limit . "minutes";
    $appointmentEndTime = date('Y-m-d H:i', strtotime($minutes, strtotime($_REQUEST['appointmentStart'])));
    $checkOut = date('H:i', strtotime($appointmentEndTime));
    $appointmentArr = DB::select(DB::raw("SELECT * FROM appointments WHERE `user_id` = '$userId' AND `deleted_at` IS NULL 
        AND `practitionner_id` = '$practitionnerId' 
        AND ('$appointmentEndTime' BETWEEN STR_TO_DATE(`appointment_start`, '%Y-%m-%d %H:%i:%s') AND STR_TO_DATE(`appointment_end`,
        '%Y-%m-%d %H:%i:%s')) AND id NOT IN ('$appointmentId') "));
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
    $month = Date("m");
    $year = Date("Y");
    $userId = Auth::user()->id;
    $calender  = DB::select(DB::raw("SELECT c.first_name, c.last_name ,a.`appointment_start`,r.`color`,a.`note`,r.`name` FROM `appointments` a INNER JOIN `clients` c ON c.id=a.`client_id`
    INNER JOIN `rooms` r ON r.`id`=a.`room_id` WHERE a.`user_id`='$userId'
    AND a.`deleted_at` IS NULL AND YEAR(a.`appointment_start`)='$year'"));

    $calenderData = array();
    for ($i = 0; $i < count($calender); $i++) {
      $info = array();
      $fullName = ucwords($calender[$i]->name) . " " . ucwords($calender[$i]->first_name) . " " . ucwords($calender[$i]->last_name);
      $info['title'] = $fullName;
      $info['start'] = $calender[$i]->appointment_start;
      $info['color'] = $calender[$i]->color;
      $info['description'] = ucfirst($calender[$i]->note);
      array_push($calenderData, $info);
    }
    $calenderData = json_encode($calenderData);
    return view('appointment.calender', compact('calenderData'));
  }
  public function dashboard()
  {
    $month = Date("m");
    $year = Date("Y");
    $userId = Auth::user()->id;
    $appointmentsInfo = DB::select(DB::raw("SELECT COUNT(*) AS total_appointment , 
    COUNT(CASE WHEN `status`='taken'  THEN 1 END) AS taken,
    COUNT(CASE WHEN `status`='cancelled'  THEN 1 END) AS cancelled,
    COUNT(CASE WHEN `status`='checkin'  THEN 1 END) AS checkin,
    COUNT(CASE WHEN `status`='confirmed'  THEN 1 END) AS confirmed,
    SUM(CASE WHEN `status`='confirmed'  THEN paid END) AS total_revenue
    
    FROM `appointments` WHERE  deleted_at is null AND user_id='$userId' AND MONTH(`appointment_start`)='$month' AND YEAR(`appointment_start`)='$year'"));
    // graph
    $revenue  = DB::select(DB::raw("SELECT 
    DAY(appointment_start) AS appointment_start, SUM(paid) AS paid
  FROM
    `appointments` 
  WHERE `status` = 'confirmed' 
    AND MONTH(appointment_start) = '$month' 
    AND YEAR(appointment_start) = '$year' AND user_id='$userId' AND deleted_at is null
  GROUP BY DAY(appointment_start)"));
    $days = date('t');
    $revenu = array();
    for ($i = 1; $i <= $days; $i++) {
      $revenu[$i] = 0;
    }
    for ($i = 0; $i < count($revenue); $i++) {
      $revenu[$revenue[$i]->appointment_start] = $revenue[$i]->paid;
    }
    $dataGraph = json_encode(array_values($revenu));

    return view('dashboard', compact('appointmentsInfo', 'dataGraph'));
  }
}
