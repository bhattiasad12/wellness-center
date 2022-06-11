<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = Client::where('user_id', Auth::user()->id)->get();
        return view('client.index', compact('client'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.create');
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
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email'],
            'phone_number' => ['required', 'numeric'],
            'age' => ['required', 'numeric'],
            'source' => ['required'],
            'neighborhood' => ['required'],
            'city' => ['required'],
            'zipcode' => ['required'],

        ]);
        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            //  print_r($image);
            $image_name = time() . $image->getClientOriginalName();
            //  echo $image;
            //  exit(0);
            $destinationPath = base_path('public/uploads/client');
            $image->move($destinationPath, $image_name);
            $path = 'uploads/client/' . $image_name;

            $data = Client::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'profile_pic' => $path,
                'age' => $request->age,
                'source' => $request->source,
                'neighborhood' => $request->neighborhood,
                'city' => $request->city,
                'zip_code' => $request->zipcode,
                'user_id' => Auth::user()->id,
                'created_at' => date("Y-m-d"),
                'created_by' => Auth::user()->id,
            ]);
            return redirect()->back();
        }
        // DB::enableQueryLog();
        $data = Client::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'age' => $request->age,
            'source' => $request->source,
            'neighborhood' => $request->neighborhood,
            'city' => $request->city,
            'zip_code' => $request->zipcode,
            'user_id' => Auth::user()->id,
            'created_at' => date("Y-m-d"),
            'created_by' => Auth::user()->id,
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        $userId = Auth::user()->id;
        $clientId = $client->id;
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
        LEFT JOIN `machines` m 
          ON m.`id` = a.`machine_id` 
        INNER JOIN `services` s 
          ON s.id = a.`service_id` 
        LEFT JOIN `hands` h 
          ON h.`id` = a.`hand_id` 
        INNER JOIN `practitioners` p 
          ON p.`id` = a.`practitionner_id` 
        LEFT JOIN `hand_settings` hs 
          ON hs.`id` = a.`setting_id` 
        INNER JOIN `rooms` r 
          ON a.`room_id` = r.`id` 
      WHERE a.`user_id` = '$userId' 
        AND a.`deleted_at` IS NULL AND a.`client_id`='$clientId' "));

        $paymentHistory = DB::select(DB::raw("SELECT a.id AS appointment_id,s.service_name,a.total_service_amount,a.unpaid,
        (SELECT 
            CASE
                WHEN SUM(ap.paid) IS NULL 
                THEN 0 
                ELSE SUM(ap.paid)
            END 
        FROM `appointment_payments` ap WHERE ap.appointment_id = a.`id` AND ap.deleted_at IS NULL AND ap.user_id='$userId') AS paid 
    FROM `appointments` a INNER JOIN `services` s ON a.`service_id`=s.id
    WHERE a.`client_id`='$clientId' AND a.`user_id`='$userId' AND a.`deleted_at` IS NULL"));
        // DB::enableQueryLog();
        $clientNote = DB::select(DB::raw("SELECT * FROM client_notes WHERE client_id='$clientId' AND user_id='$userId'"));
        $clientDoc = DB::select(DB::raw("SELECT * FROM client_document WHERE client_id='$clientId' AND user_id='$userId'"));

        return view('client.show',  compact('client', 'clientNote', 'clientDoc', 'appointment', 'paymentHistory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('client.edit',  compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email'],
            'phone_number' => ['required', 'numeric'],
            'age' => ['required', 'numeric'],
            'source' => ['required'],
            'neighborhood' => ['required'],
            'city' => ['required'],
            'zipcode' => ['required'],

        ]);

        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            //  print_r($image);
            $image_name = time() . $image->getClientOriginalName();
            //  echo $image;
            //  exit(0);
            $destinationPath = base_path('public/uploads/client');
            $image->move($destinationPath, $image_name);
            $path = 'uploads/client/' . $image_name;

            $hand = Client::find($id);

            $hand->first_name = $request->first_name;
            $hand->last_name = $request->last_name;
            $hand->email = $request->email;
            $hand->phone_number = $request->phone_number;
            $hand->profile_pic = $path;
            $hand->age = $request->age;
            $hand->source = $request->source;
            $hand->neighborhood = $request->neighborhood;
            $hand->city = $request->city;
            $hand->zip_code = $request->zipcode;
            $hand->user_id = Auth::user()->id;
            $hand->updated_at =  date("Y-m-d");
            $hand->updated_by =  Auth::user()->id;

            $hand->save();
            return redirect()->back();
        }
        $hand = Client::find($id);

        $hand->first_name = $request->first_name;
        $hand->last_name = $request->last_name;
        $hand->email = $request->email;
        $hand->phone_number = $request->phone_number;
        $hand->age = $request->age;
        $hand->source = $request->source;
        $hand->neighborhood = $request->neighborhood;
        $hand->city = $request->city;
        $hand->zip_code = $request->zipcode;
        $hand->user_id = Auth::user()->id;
        $hand->updated_at =  date("Y-m-d");
        $hand->updated_by =  Auth::user()->id;

        $hand->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $data = Client::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function createDocumnet()
    {
        $clientId = $_REQUEST['clientId'];
        return view('client.document_create', compact('clientId'));
    }

    public function storeDocument(request $request)
    {
        $request->validate([
            'document' => ['required', 'max:5000'],
            'client_id' => ['required'],
        ]);

        if ($request->hasFile('document')) {
            $file = $request->file('document');
            //  print_r($image);
            $file_name = time() . $file->getClientOriginalName();
            $size = $file->getSize();
            //  echo $image;
            //  exit(0);
            $destinationPath = base_path('public/uploads/client/' . $request->client_id);
            $file->move($destinationPath, $file_name);
            $path = 'uploads/client/' . $request->client_id . "/" . $file_name;

            $data = DB::table('client_document')->insert([
                'client_id' => $request->client_id,
                'user_id' => Auth::user()->id,
                'file_name' => $file->getClientOriginalName(),
                'size' => $size,
                'path' => $path,
                'created_at' => date("Y-m-d h:i:s"),
                'created_by' => Auth::user()->id,
            ]);
            return redirect()->back();
        }
    }
}
