<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RoomsType;
use Illuminate\Http\Request;

class RoomsTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roomType = RoomsType::all();
        return view('admin.rooms-type.index', compact('roomType'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.rooms-type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $type = new RoomsType;
        $type->name = $request->name;
        $type->save();
        // dd($type);
        return redirect()->route('room-type.index')->with('status','Operation Seccess');
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
        $roomType = RoomsType::findOrFail($id);
        return view('admin.rooms-type.edit', compact('roomType'));
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
        $room_type = RoomsType::findOrFail($id);
        $room_type->name = $request->name;
        // dd($room);
        $room_type->save();
        return redirect()->route('room-type.index')->with('status','Operation Seccess');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = RoomsType::findOrFail($id);

        $data->delete();
        return redirect()->route('room-type.index')->with('status','Operation Seccess');
    }
}
