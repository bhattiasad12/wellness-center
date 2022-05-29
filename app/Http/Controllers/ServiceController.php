<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Machine;
use App\Models\ServiceZone;
use Illuminate\Support\Facades\Log;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::user()->id;
        $service = DB::select(DB::raw("SELECT s.id AS service_id,s.service_name, m.name AS machine_name,h.name AS hand_name, s.zone,s.session,s.time_limit,s.price FROM `services` s 
        INNER JOIN `machines` m ON m.id=s.machine_id INNER JOIN `hands` h 
        ON h.id=s.hand_id WHERE s.user_id='$userId' AND s.deleted_at IS NULL"));
        return view('service.index', compact('service'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userId = Auth::user()->id;
        $zone = DB::select(DB::raw("SELECT * FROM zone "));
        $machine = Machine::where('user_id', Auth::user()->id)->get();

        return view('service.create', compact('zone', 'machine'));
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
            'machine' => ['required', 'numeric'],
            'hand' => ['required', 'numeric'],
            'service_name' => ['required'],
            'session' => ['required'],
        ]);

        Service::create([
            'machine_id' => $request->machine,
            'hand_id' => $request->hand,
            'service_name' => $request->service_name,
            'session' => $request->session,
            'user_id' => Auth::user()->id,
            'created_at' => date("Y-m-d h:i:s"),
            'created_by' => Auth::user()->id,
        ]);

        //Log::info('Showing the user profile for user: ' . $user);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        $serviceId = $service->id;
        $userId = Auth::user()->id;
        $machine = Machine::where('user_id', Auth::user()->id)->where('id', $service->machine_id)->get();
        $serviceZone = ServiceZone::where('user_id', Auth::user()->id)->where('service_id', $serviceId)->get();
        return view('service.show', compact('serviceZone', 'service', 'machine'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        $userId = Auth::user()->id;
        $zone = DB::select(DB::raw("SELECT * FROM zone "));
        $machine = Machine::where('user_id', Auth::user()->id)->get();

        return view('service.edit', compact('service', 'zone', 'machine'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $validatedData = $request->validate([
            'machine' => ['required', 'numeric'],
            'hand' => ['required', 'numeric'],
            'service_name' => ['required'],
            'session' => ['required'],
        ]);

        $service = Service::find($id);

        $service->machine_id = $request->machine;
        $service->hand_id = $request->hand;
        $service->service_name = $request->service_name;
        $service->session = $request->session;
        $service->updated_at =  date("Y-m-d h:i:s");
        $service->updated_by =   Auth::user()->id;

        $service->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $data = Service::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function getMachineHand()
    {
        $userId = Auth::user()->id;

        $machineId = $_REQUEST['machineId'];

        return DB::select(DB::raw("SELECT * FROM hands where machine_id='$machineId' AND user_id='$userId' "));
    }
}
