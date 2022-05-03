<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $room = Room::get();
        return view('room/room', compact('room'));
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

        $request->validate([
            'room' => ['required'],
            'color' => ['required'],
        ]);

        $user = Room::create([
            'name' => $request->room,
            'color' => $request->color,
            'user_id' => Auth::user()->id,
            'created_at' => date("Y-m-d"),
            'created_by' => Auth::user()->id,
        ]);
        //Log::info('Showing the user profile for user: ' . $user);

        return redirect()->route('room.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            'room' => ['required'],
            'color' => ['required'],
        ]);

        $room = Room::find($id);

        $room->name = $request->room;
        $room->color = $request->color;
        $room->user_id = '1';
        $room->updated_at =  date("Y-m-d");
        $room->updated_by =   '1';

        $room->save();
        return redirect()->route('room.index');
        //Log::info('Showing the user profile for user: ' . $user);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        //
    }
}
