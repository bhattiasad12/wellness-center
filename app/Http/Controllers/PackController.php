<?php

namespace App\Http\Controllers;

use App\Models\Pack;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Service;
use Illuminate\Http\Request;

class PackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::user()->id;
        $pack = Pack::where('user_id', $userId)->get();

        for ($i = 0; $i < count($pack); $i++) {
            $ids = $pack[$i]->services_id;
            $serviceName = DB::select(DB::raw("SELECT GROUP_CONCAT(service_name) AS service_name FROM `services` WHERE id IN ($ids) AND `deleted_at` IS NULL  AND `user_id`='$userId' "));
            $pack[$i]['services_name'] = $serviceName[0]->service_name;
        }
        return view('pack.pack_index', compact('pack'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userId = Auth::user()->id;
        $service = Service::where('user_id', $userId)->get();
        return view('pack.pack_create', compact('service'));
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
            'pack_name' => ['required'],
            'session' => ['required'],
            'services' => ['required'],
            'price' => ['required'],

        ]);
        // DB::enableQueryLog();
        $data = Pack::create([
            'pack_name' => $request->pack_name,
            'services_id' => implode(',', $request->services),
            'session' => $request->session,
            'pack_price' => $request->price,
            'user_id' => Auth::user()->id,
            'created_at' => date("Y-m-d"),
            'created_by' => Auth::user()->id,
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pack  $pack
     * @return \Illuminate\Http\Response
     */
    public function show(Pack $pack)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pack  $pack
     * @return \Illuminate\Http\Response
     */
    public function edit(Pack $pack)
    {
        $userId = Auth::user()->id;
        $service = Service::where('user_id', $userId)->get();
        return view('pack.pack_edit', compact('service', 'pack'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pack  $pack
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            'pack_name' => ['required'],
            'session' => ['required'],
            'services' => ['required'],
            'price' => ['required'],
        ]);

        $pack = Pack::find($id);

        $pack->pack_name = $request->pack_name;
        $pack->session = $request->session;
        $pack->pack_price = $request->price;
        $pack->services_id = implode(',', $request->services);
        $pack->user_id = Auth::user()->id;
        $pack->updated_at =  date("Y-m-d");
        $pack->updated_by =   Auth::user()->id;

        $pack->save();
        return redirect()->back();
        //Log::info('Showing the user profile for user: ' . $user);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pack  $pack
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $data = Pack::find($id);
        $data->delete();
        return redirect()->back();
    }
}
