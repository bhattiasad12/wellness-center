<?php

namespace App\Http\Controllers;

use App\Models\ClientNote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientNoteController extends Controller
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
        $clientId = $_REQUEST['clientId'];
        return view('client/note_create', compact('clientId'));
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
            'client_id' => ['required'],
            'note' => ['required'],

        ]);
        // DB::enableQueryLog();
        $data = ClientNote::create([
            'client_id' => $request->client_id,
            'note' => $request->note,
            'user_name' => Auth::user()->first_name,
            'user_id' => Auth::user()->id,
            'created_at' => date("Y-m-d"),
            'created_by' => Auth::user()->id,
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClientNote  $clientNote
     * @return \Illuminate\Http\Response
     */
    public function show(ClientNote $clientNote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClientNote  $clientNote
     * @return \Illuminate\Http\Response
     */
    public function edit(ClientNote $clientNote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClientNote  $clientNote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            'task_status' => ['required'],
        ]);

        $hand = ClientNote::find($id);

        $hand->status = $request->task_status;
        $hand->user_id = Auth::user()->id;
        $hand->updated_at =  date("Y-m-d");
        $hand->updated_by =  Auth::user()->id;

        $hand->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClientNote  $clientNote
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClientNote $clientNote)
    {
        //
    }
}
