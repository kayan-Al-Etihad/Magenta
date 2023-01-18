<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Rooms;
use App\Models\RoomsType;
use Illuminate\Http\Request;

class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Rooms::all();
        $roomType = RoomsType::all();
        return view('Front.rooms.index', compact('rooms','roomType'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(RoomsType $roomsType)
    {
        $rooms = Rooms::where('rooms_type_id', '=', $roomsType->id)->get();
        $availableRooms = Rooms::all();
        return view('Front.rooms.show', compact('roomsType', 'rooms', 'availableRooms'));
    }

    public function showSingleProduct(Rooms $roomId)
    {
        $room = Rooms::where('id', '=', $roomId->id)->get();
        $availableRooms = Rooms::all();
        return view('Front.rooms.singleProductshow', compact('roomId', 'room', 'availableRooms'));
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
