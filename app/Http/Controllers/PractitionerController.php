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
        $practitioner = Practitioner::where('user_id', Auth::user()->id)->get();
        return view('practitioner.index', compact('practitioner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $days = PractitionerDay::get();
        return view('practitioner.create', compact('days'));
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
            'email' => ['required', 'email'],
            'phone_number' => ['required'],
            'days.*' => ['required'],
            'check_in.*' => ['required'],
            'check_out.*' => ['required'],
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
            $practitionerTime['start_time'] = date("H:i:s", strtotime($request->check_in[$i]));
            $practitionerTime['end_time'] = date("H:i:s", strtotime($request->check_out[$i]));
            DB::table('practitioners_time')->insert($practitionerTime);
        }
        // dd(DB::getQueryLog());
        //Log::info('Showing the user profile for user: ' . $data['id']);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Practitioner  $practitioner
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $userId = Auth::user()->id;
        $data = DB::select(DB::raw("SELECT * FROM `practitioners` p INNER JOIN `practitioners_time`pt ON p.`id`=pt.`practitioner_id`
        INNER JOIN `practitioners_days`pd ON pd.`id`=pt.`practitioner_day_id` WHERE p.`deleted_at` IS NULL
        AND p.`id`='$id' AND p.`user_id`='$userId' ORDER BY pd.`id` ASC "));
        return view('practitioner.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Practitioner  $practitioner
     * @return \Illuminate\Http\Response
     */
    public function edit(Practitioner $practitioner)
    {
        $id = $practitioner->id;
        $days = PractitionerDay::get();
        $userId = Auth::user()->id;
        $practitioner = DB::select(DB::raw("SELECT *,pt.`id` AS practitioner_time_id FROM `practitioners` p INNER JOIN `practitioners_time`pt ON p.`id`=pt.`practitioner_id`
        INNER JOIN `practitioners_days`pd ON pd.`id`=pt.`practitioner_day_id` WHERE p.`deleted_at` IS NULL
        AND p.`id`='$id' AND p.`user_id`='$userId' ORDER BY pd.`id` ASC "));

        return view('practitioner.edit',  compact('days', 'practitioner', 'id'));
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
        $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email'],
            'phone_number' => ['required'],
            'days.*' => ['required'],
            'check_in.*' => ['required'],
            'check_out.*' => ['required'],
        ]);
        $data = Practitioner::find($practitioner->id);

        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->email = $request->email;
        $data->phone_number = $request->phone_number;
        $data->user_id = Auth::user()->id;
        $data->created_at = date("Y-m-d");
        $data->created_by = Auth::user()->id;

        $data->save();
        // DB::enableQueryLog();
        for ($i = 0; $i < count($request->practitioner_time_id); $i++) {

            $practitionerTime = array();
            $practitionerTime['practitioner_id'] = $practitioner['id'];
            $practitionerTime['practitioner_day_id'] = $request->days[$i];
            $practitionerTime['start_time'] = $request->check_in[$i];
            $practitionerTime['end_time'] = $request->check_out[$i];
            DB::table('practitioners_time')->where('id', $request->practitioner_time_id[$i])->update($practitionerTime);
        }
        // dd(DB::getQueryLog());
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Practitioner  $practitioner
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $data = Practitioner::find($id);
        $data->delete();
        return redirect()->back();
    }
}
