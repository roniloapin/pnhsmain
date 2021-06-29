<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;


class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Room::orderBy('room', 'asc')->paginate(20);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'room' => 'required|string|max:191|unique:rooms',
        ]);

        return Room::create([
            'room'=>$request['room'],
            'room_number'=>$request['room_number'],
        ]);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $room = Room::findOrFail($id);

        $this->validate($request,[
            'room' => 'required|string|max:191',
        ]);

        $room->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $room = Room::findOrFail($id);
        $room->delete();
    }

    public function search(){
        if ($search = \Request::get('y')){
            $rooms = Room::where(function($query) use ($search){
                $query->where('room', 'LIKE', "%$search%");
            })->orderBy('room', 'asc')->paginate(20);
        }else{
            $rooms = Room::orderBy('room', 'asc')->paginate(10);
        }
        return $rooms;
    }
}

//last is y
