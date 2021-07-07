<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\User;
use App\Models\Subject;
use App\Models\Room;
use App\Models\Strand;




class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Schedule::with(['subject','room','user',])->where('key_stage','jhs')->orderBy('grade_level', 'asc')->orderBy('day', 'asc')->paginate(20);

    }

    public function indexSHS()
    {
        return Schedule::with(['subject','room','user','strand'])->where('key_stage','shs')->orderBy('grade_level', 'asc')->orderBy('day', 'asc')->paginate(20);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Schedule::create([
            'user_id'=>$request['user_id'],
            'subject_id'=>$request['subject_id'],
            'time_start'=>$request['time_start'],
            'time_end'=>$request['time_end'],
            'room_id'=>$request['room_id'],
            'key_stage'=>$request['key_stage'],
            'grade_level'=>$request['grade_level'],
            'strand_id'=>$request['strand_id'],
            'day'=>$request['day'],
            
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
        $schedule = Schedule::findOrFail($id);
        $schedule->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $schedule = Schedule::findOrFail($id);
        $schedule->delete();
    }
}
