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

        // echo '<pre>';
        // print_r($data);
        // echo '<pre>';

        // die();
        return view('settings', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // echo '<pre>';
        // print_r($request);
        // echo '<pre>';
        // die();

        $fullName = $request->full_name;
        $fullName = explode(' ', $fullName);
        $userId = Auth::user()->id;
        $user = User::find($userId);

        $validatedData = $request->validate([
            'file' => 'png,jpg,jpeg|max:2048',

        ]);

        if ($request->hasFile('profile_picture')) {
            $fileName = $userId . '.jpg';
            $request->profile_picture->storeAs('profile', $fileName, 'public');
            $user->profile_picture = $fileName;
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
}
