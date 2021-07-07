<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\Student;
use App\Models\LearnerType;
use App\Models\MotherTongue;
use App\Models\Religion;
use App\Models\Strand;
use App\Models\Schoolyear;

class PrintStudentController extends Controller
{
    public function index($id){
        $data = Student::with(['learner_type','mother_tongue'])->findOrFail($id);
        
        $pdf = PDF::loadView('print', [
            'data' => $data,
        ])->setPaper('Legal', 'portrait');;
        return $pdf->stream();
    }
}
