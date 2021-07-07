<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\Student;

class PrintStudentController extends Controller
{
    public function index($id){
        $data = Student::findOrFail($id);
        $pdf = PDF::loadView('print', [
            'data' => $data,
        ]);
        return $pdf->stream();
    }
}
