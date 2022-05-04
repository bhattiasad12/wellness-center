<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class RoomController extends Controller
{

    public function index()
    {
        $room = Room::where('user_id', Auth::user()->id)->get();
        return view('room.index', compact('room'));
    }


    public function create()
    {
        return view('room.create');
    }


    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'room' => ['required'],
            'color' => ['required'],
        ]);

        Room::create([
            'name' => $request->room,
            'color' => $request->color,
            'user_id' => Auth::user()->id,
            'created_at' => date("Y-m-d"),
            'created_by' => Auth::user()->id,
        ]);

        //Log::info('Showing the user profile for user: ' . $user);

        return redirect()->route('room.index');
    }


    public function show(Room $room)
    {
    }


    public function edit(Room $room)
    {
        return view('room.edit', ['room' => $room]);
    }


    public function update(Request $request, int $id)
    {
        $request->validate([
            'room' => ['required'],
            'color' => ['required'],
        ]);

        $room = Room::find($id);

        $room->name = $request->room;
        $room->color = $request->color;
        $room->user_id = Auth::user()->id;
        $room->updated_at =  date("Y-m-d");
        $room->updated_by =   Auth::user()->id;

        $room->save();
        return redirect()->route('room.index');
        //Log::info('Showing the user profile for user: ' . $user);

    }


    public function destroy(Room $room)
    {
        //
    }
}
