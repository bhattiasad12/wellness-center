<?php

namespace App\Http\Controllers;

use App\Models\ServiceZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Machine;

class ServiceZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $serviceId = $_REQUEST['service_id'];
        $userId = Auth::user()->id;
        $zone = DB::select(DB::raw("SELECT * FROM zone "));

        return view('service.zone.zone_create', compact('zone', 'serviceId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'zone' => ['required'],
            'time_limit' => ['required', 'numeric'],
            'price' => ['required', 'numeric'],
            'service_id' => ['required', 'numeric'],
        ]);

        ServiceZone::create([
            'zone' => $request->zone,
            'time_limit' => $request->time_limit,
            'price' => $request->price,
            'service_id' => $request->service_id,
            'user_id' => Auth::user()->id,
            'created_at' => date("Y-m-d h:i:s"),
            'created_by' => Auth::user()->id,
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ServiceZone  $serviceZone
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceZone $serviceZone)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ServiceZone  $serviceZone
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiceZone $serviceZone)
    {
        $userId = Auth::user()->id;
        $zone = DB::select(DB::raw("SELECT * FROM zone "));

        return view('service.zone.zone_edit', compact('serviceZone', 'zone'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ServiceZone  $serviceZone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $validatedData = $request->validate([
            'zone' => ['required'],
            'time_limit' => ['required', 'numeric'],
            'price' => ['required', 'numeric'],
        ]);

        $serviceZone = ServiceZone::find($id);

        $serviceZone->zone = $request->zone;
        $serviceZone->time_limit = $request->time_limit;
        $serviceZone->price = $request->price;
        $serviceZone->updated_at =  date("Y-m-d h:i:s");
        $serviceZone->updated_by =   Auth::user()->id;

        $serviceZone->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServiceZone  $serviceZone
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $data = ServiceZone::find($id);
        $data->delete();
        return redirect()->back();
    }
}
