<?php

namespace App\Http\Controllers;

use App\Models\HandSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class HandSettingController extends Controller
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
        $userId = Auth::user()->id;
        $mechineId = $_REQUEST['mechineId'];
        // DB::enableQueryLog();
        $handLov = DB::select(DB::raw("SELECT * FROM hands 
        WHERE `deleted_at` IS NULL AND `machine_id`='$mechineId' AND `user_id`='$userId' "));

        // Log::info('Showing the user profile for user: ' . $handLov);
        return view('machine/setting_create', compact('handLov', 'mechineId'));
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
            'machine_id' => ['required'],
            'hand' => ['required'],
            'setting_name' => ['required'],
            'min' => ['required'],
            'max' => ['required'],
            'start' => ['required'],

        ]);
        // DB::enableQueryLog();
        $data = HandSetting::create([
            'machine_id' => $request->machine_id,
            'hand_id' => $request->hand,
            'setting_name' => $request->setting_name,
            'min' => $request->min,
            'max' => $request->max,
            'start' => $request->start,
            'user_id' => Auth::user()->id,
            'created_at' => date("Y-m-d"),
            'created_by' => Auth::user()->id,
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HandSetting  $handSetting
     * @return \Illuminate\Http\Response
     */
    public function show(HandSetting $handSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HandSetting  $handSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(HandSetting $handSetting)
    {
        $userId = Auth::user()->id;
        $mechineId = $_REQUEST['mechineId'];
        $handLov = DB::select(DB::raw("SELECT * FROM hands 
        WHERE `deleted_at` IS NULL AND `machine_id`='$mechineId' AND `user_id`='$userId' "));

        return view('machine.setting_edit',  compact('handLov', 'handSetting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HandSetting  $handSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            'hand' => ['required'],
            'setting_name' => ['required'],
            'min' => ['required'],
            'max' => ['required'],
            'start' => ['required'],
        ]);

        $handSetting = HandSetting::find($id);

        $handSetting->hand_id = $request->hand;
        $handSetting->setting_name = $request->setting_name;
        $handSetting->min = $request->min;
        $handSetting->max = $request->max;
        $handSetting->start = $request->start;
        $handSetting->updated_at =  date("Y-m-d");
        $handSetting->updated_by =  Auth::user()->id;

        $handSetting->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HandSetting  $handSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $data = HandSetting::find($id);
        $data->delete();
        return redirect()->back();
    }
}
