<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use App\Models\Hand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MachineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $machine = Machine::where('user_id', Auth::user()->id)->get();
        return view('machine.index', compact('machine'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('machine.create');
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
            'machine' => ['required'],

        ]);
        // DB::enableQueryLog();
        $data = Machine::create([
            'name' => $request->machine,
            'user_id' => Auth::user()->id,
            'created_at' => date("Y-m-d"),
            'created_by' => Auth::user()->id,
        ]);
        return redirect()->route('machine.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Machine  $machine
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $machineId = $id;
        $userId = Auth::user()->id;
        $hand = DB::select(DB::raw("SELECT m.name AS machine_name ,h.name AS hand_name,h.`id` AS hand_id FROM machines m INNER JOIN hands h ON m.id=h.machine_id
        WHERE h.`deleted_at` IS NULL AND h.`machine_id`='$machineId' AND h.`user_id`='$userId' "));

        $handSetting = DB::select(DB::raw("SELECT *,h.name AS hand_name,hs.id AS hand_setting_id FROM hands h INNER JOIN hand_settings hs
        ON h.id=hs.hand_id  WHERE h.`deleted_at` IS NULL AND h.`machine_id`='$machineId' AND h.`user_id`='$userId' AND hs.`deleted_at` IS NULL"));

        return view('machine.show', compact('hand', 'machineId', 'handSetting'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Machine  $machine
     * @return \Illuminate\Http\Response
     */
    public function edit(Machine $machine)
    {

        return view('machine.edit',  ['machine' => $machine]);
    }
    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Machine  $machine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {

        $request->validate([
            'machine' => ['required'],
        ]);

        $machine = Machine::find($id);

        $machine->name = $request->machine;
        $machine->user_id = Auth::user()->id;
        $machine->updated_at =  date("Y-m-d");
        $machine->updated_by =  Auth::user()->id;

        $machine->save();
        return redirect()->route('machine.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Machine  $machine
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $data = Machine::find($id);
        $data->delete();
        return redirect()->route('machine.index');
    }
}
