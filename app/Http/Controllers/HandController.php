<?php

namespace App\Http\Controllers;

use App\Models\Hand;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

class HandController extends Controller
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
        $mechineId = $_REQUEST['mechineId'];

        return view('machine/hand_create', compact('mechineId'));
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
            'hand' => ['required'],
            'machine_id' => ['required'],

        ]);
        // DB::enableQueryLog();
        $data = Hand::create([
            'name' => $request->hand,
            'machine_id' => $request->machine_id,
            'user_id' => Auth::user()->id,
            'created_at' => date("Y-m-d"),
            'created_by' => Auth::user()->id,
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hand  $hand
     * @return \Illuminate\Http\Response
     */
    public function show(Hand $hand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hand  $hand
     * @return \Illuminate\Http\Response
     */
    public function edit(Hand $hand)
    {
        return view('machine/hand_edit', compact('hand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hand  $hand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            'hand' => ['required'],
        ]);

        $hand = Hand::find($id);

        $hand->name = $request->hand;
        $hand->user_id = Auth::user()->id;
        $hand->updated_at =  date("Y-m-d");
        $hand->updated_by =  Auth::user()->id;

        $hand->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hand  $hand
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $data = Hand::find($id);
        $data->delete();
        return redirect()->back();
    }
}
