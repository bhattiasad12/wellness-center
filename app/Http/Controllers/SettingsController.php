<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Models\PractitionerDay;
use App\Models\CenterTiming;
use Illuminate\Support\Facades\DB;


class SettingsController extends Controller
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
        $centerTiming = new CenterTiming();
        $centerTimings =  $centerTiming->day();
        // DB::enableQueryLog();
        $days =
            DB::table('practitioners_days')
            ->leftJoin('center_timings', 'practitioners_days.id', '=', 'center_timings.practitioner_day_id')
            ->whereNull('practitioners_days.deleted_at')
            ->groupBy('practitioners_days.id')
            ->get();
        // DB::enableQueryLog();

        // dd(DB::getQueryLog());


        $userId = Auth::user()->id;
        $user = User::find($userId);
        $data['id'] = ucwords($user->id);
        $data['first_name'] = ucwords($user->first_name);
        $data['last_name'] = ucwords($user->last_name);
        $data['full_name'] = $data['first_name'] . ' ' . $data['last_name'];
        $data['email'] = $user->email;
        $data['contact_no'] = $user->contact_no;
        $data['profile_picture'] = $user->profile_picture;
        $data['user_type'] = $user->user_type;

        return view('user.settings', compact('data', 'days', 'centerTimings'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fullName = $request->full_name;
        $fullName = explode(' ', $fullName);
        $userId = Auth::user()->id;
        $user = User::find($userId);

        $validatedData = $request->validate([
            'file' => 'png,jpg,jpeg|max:2048',

        ]);

        if ($request->hasFile('profile_picture')) {
            $folderName = $userId;
            $fileName = time();
            $previousPic = $user->profile_picture;
            $previousPicDest = "profile/" . $previousPic;
            File::delete($previousPicDest);
            $request->profile_picture->storeAs("profile/$folderName/", $fileName . '.jpg', 'public');
            $user->profile_picture = $folderName . '/' . $fileName . '.jpg';
        }

        $user->first_name = $fullName[0];
        $user->last_name = $fullName[1];
        $user->contact_no = $request->contact_no;

        $user->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function updateEmail(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'confirmemailpassword' => ['required'],

        ]);

        if (Hash::check($request->confirmemailpassword, $user->password)) {

            $user->email = $request->email;
            $user->save();
            return redirect()->back();
        } else {
            $request->session()->flash('error', 'Password does not match');
            return redirect()->back();
        }
    }

    public function updatePassword(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'confirmed|max:8|different:old_password',
        ]);

        if (Hash::check($request->old_password, $user->password)) {
            $user->fill([
                'password' => Hash::make($request->password)
            ])->save();

            $request->session()->flash('success', 'Password changed');
            return redirect()->back();
        } else {
            $request->session()->flash('error', 'Password does not match');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function centreTiming(Request $request)
    {             
        //   dd( $request);

        $request->validate([
            'practitioner_day_id.*' => ['required', 'unique:center_timing'],
            'check_in.*' => ['required'],
            'check_out.*' => ['required'],

        ]);
        // DB::enableQueryLog();
        // echo ($request->status);

        CenterTiming::whereNotNull('id')->delete();
        for ($i = 0; $i < count($request->days); $i++) {
            if ($request->status[$i] == 'off') {

                DB::table('center_timings')
                    ->where('practitioner_day_id', $i + 1)
                    ->update([
                        'deleted_at' => date("Y-m-d")
                    ]);
                    continue;
            } else {
                // dd($request);

                DB::table('center_timings')
                    ->where('practitioner_day_id', $i + 1)
                    ->update([
                        'start_time' => $request->check_in[$i],
                        'end_time' => $request->check_out[$i],
                        'user_id' => Auth::user()->id,
                        'created_at' => date("Y-m-d"),
                        'created_by' => Auth::user()->id,
                        'deleted_at' => null
                    ]);
                // }
            }
            // dd(DB::getQueryLog());
            // dd($request);
        }
        return redirect()->back();
    }
}
