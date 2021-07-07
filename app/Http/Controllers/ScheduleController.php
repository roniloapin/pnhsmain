<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\User;
use App\Models\Subject;
use App\Models\Room;
use App\Models\Strand;


class ScheduleController extends Controller
{
    public function index(){
        $data = Schedule::where('key_stage','jhs')->orderBy('grade_level', 'asc')->orderBy('day', 'asc')->paginate(20); 
        // $sdata = Schedule::where('key_stage','shs')->orderBy('grade_level', 'asc')->orderBy('day', 'asc')->paginate(20); 
        // return response()->json([
        //     'data' => $data,
        // ]);
        return view('schedule',['schedules'=>$data]);
    }

}
