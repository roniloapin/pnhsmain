<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\LearnerType;
use App\Models\MotherTongue;
use App\Models\Religion;
use App\Models\Strand;
use App\Models\Schoolyear;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Student::orderBy('last_name', 'asc')->paginate(20);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        // $this->validate($request,[
        //     'learner_type' => 'required|string|max:191',
        //     'lrn' => 'required|string|max:191|unique:students',
        //     'last_name' => 'required|string|max:191',
        //     'first_name' => 'required|string|max:191',
        // ]);

        // $learnertype = LearnerType::findOrFail($request['learner_type_id']);

       Student::create([
        'learner_type_id'=>$request['learner_type_id'],
        
        'lrn'=>$request['lrn'],
        'last_name'=>$request['last_name'],
        'first_name'=>$request['first_name'],
        'middle_name'=>$request['middle_name'],
        'extension'=>$request['extension'],
        'email'=>$request['email'],
        'date_of_birth'=>$request['date_of_birth'],
        'gender'=>$request['gender'],
        'religion_id'=>$request['religion_id'],
        'psa'=>$request['psa'],
        'indigenous'=>$request['indigenous'],
        'mother_tongue_id'=>$request['mother_tongue_id'],
        'special_educational'=>$request['special_educational'],
        'specify_lrn'=>$request['specify_lrn'],
        'region'=>$request['region'],
        'province'=>$request['province'],
        'house_no_street'=>$request['house_no_street'],
        'city_municipality'=>$request['city_municipality'],
        'barangay'=>$request['barangay'],
        'father_name'=>$request['father_name'],
        'father_education'=>$request['father_education'],
        'father_employment'=>$request['father_employment'],
        'father_number'=>$request['father_number'],
        'mother_name'=>$request['mother_name'],
        'mother_education'=>$request['mother_education'],
        'mother_employment'=>$request['mother_employment'],
        'mother_number'=>$request['mother_number'],
        'guardian_name'=>$request['guardian_name'],
        'guardian_education'=>$request['guardian_education'],
        'guardian_employment'=>$request['guardian_employment'],
        'guardian_number'=>$request['guardian_number'],
        'key_stage'=>$request['key_stage'],
        'jhs_grade_level'=>$request['jhs_grade_level'],
        'shs_strand_id'=>$request['shs_strand_id'],
        'school_year'=>$request['school_year'],
        'picture' => $request['picture'],
        'status' => 'Pending',
        ]);

        $request->session()->flash('success_registration', 'Pre-registration has been successful!     Proceed to Office of the Registrar for the approval');

        $religions = Religion::all();
        $learnerTypes = LearnerType::all();
        $motherTongues = MotherTongue::all();
        $strands = Strand::all();
        $schoolyears = Schoolyear::all();
        return view('registrationform')->with(['religions' => $religions, 'learnerTypes' => $learnerTypes, 'motherTongues' => $motherTongues, 'strands' => $strands, 'schoolyears' => $schoolyears]);
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
        $student = Student::findOrFail($id);

        $this->validate($request,[
            'learner_type' => 'required|string|max:191',
            'lrn' => 'required|string|max:191',
            'last_name' => 'required|string|max:191',
            'first_name' => 'required|string|max:191',
        ]);

        $student->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
    }
    public function search(){
        if ($search = \Request::get('u')){
            $students = Student::where(function($query) use ($search){
                $query->where('lrn', 'LIKE', "%$search%")
                ->orWhere('last_name', 'LIKE', "%$search%")
                ->orWhere('first_name', 'LIKE', "%$search%");
            })->orderBy('last_name', 'asc')->paginate(20);
        }else{
            $students = Student::orderBy('last_name', 'asc')->paginate(20);
        }
        return $students;
    }
}

//SEARCH U
