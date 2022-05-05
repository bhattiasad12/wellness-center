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
        return view('client/client_index', compact('client'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client/client_create');
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
        // DB::enableQueryLog();
        $clientNote = DB::select(DB::raw("SELECT * FROM client_notes WHERE client_id='$clientId' AND user_id='$userId'"));
        return view('client/client_show',  compact('client', 'clientNote'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('client/client_edit',  compact('client'));
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
            $hand->profile_pic = $request->path;
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
        return view('client/document_create', compact('clientId'));
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
                'created_at' => date("Y-m-d"),
                'created_by' => Auth::user()->id,
            ]);
            return redirect()->back();
        }
    }
}
