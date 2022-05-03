<?php

namespace App\Http\Controllers;

use App\Models\Practitioner;
use App\Models\PractitionerDay;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PractitionerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $practitioner = Practitioner::get();
        $days = PractitionerDay::get();
        return view('practitioner/practitioner', ['days' => $days]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required'],
            'phone_number' => ['required'],
            'days' => ['required'],
            'check_in' => ['required'],
            'check_out' => ['required'],
        ]);
        // DB::enableQueryLog();
        $data = Practitioner::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'user_id' => Auth::user()->id,
            'created_at' => date("Y-m-d"),
            'created_by' => Auth::user()->id,
        ]);
        for ($i = 0; $i < count($request->days); $i++) {

            $practitionerTime = array();
            $practitionerTime['practitioner_id'] = $data['id'];
            $practitionerTime['practitioner_day_id'] = $request->days[$i];
            $practitionerTime['start_time'] = $request->check_in[$i];
            $practitionerTime['end_time'] = $request->check_out[$i];
            DB::table('practitioners_time')->insert($practitionerTime);
        }
        // dd(DB::getQueryLog());
        //Log::info('Showing the user profile for user: ' . $data['id']);
        return redirect()->route('practitioner.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Practitioner  $practitioner
     * @return \Illuminate\Http\Response
     */
    public function show(Practitioner $practitioner)
    {
        $data = array();
        return view('practitioner/practitioner_details', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Practitioner  $practitioner
     * @return \Illuminate\Http\Response
     */
    public function edit(Practitioner $practitioner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Practitioner  $practitioner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Practitioner $practitioner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Practitioner  $practitioner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Practitioner $practitioner)
    {
        //
    }
}
