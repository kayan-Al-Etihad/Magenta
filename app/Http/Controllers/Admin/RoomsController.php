<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rooms;
use App\Models\RoomsType;
use Illuminate\Http\Request;

class RoomsController extends Controller
{


    public function index()
    {
        $rooms = Rooms::all();
        $roomType = RoomsType::all();
        return view('admin.rooms.index', compact('rooms','roomType'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roomType = RoomsType::all();
        return view('admin.rooms.create', compact('roomType'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $room = new Rooms;
        $room->name = $request->name;
        $room->rooms_type_id = $request->rooms_type_id;
        $room->price = $request->price;
        $room->description = $request->description;
        $room->embeded_code = $request->embeded_code;
        $room->save();
        // dd($room);
        return redirect()->route('rooms.index')->with('status','Operation Seccess');
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
        $room = Rooms::findOrFail($id);
        $roomType = RoomsType::all();
        return view('admin.rooms.edit', compact('room','roomType'));
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
        $room = Rooms::findOrFail($id);
        $room->name = $request->name;
        $room->rooms_type_id = $request->rooms_type_id;
        $room->price = $request->price;
        $room->description = $request->description;
        $room->embeded_code = $request->embeded_code;
        // dd($room);
        $room->save();
        return redirect()->route('rooms.index')->with('status','Operation Seccess');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Rooms::findOrFail($id);

        $data->delete();
        return redirect()->route('rooms.index')->with('status','Operation Seccess');
    }
}
