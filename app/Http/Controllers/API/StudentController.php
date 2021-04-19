<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;

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
        $this->validate($request,[
            'learner_type' => 'required|string|max:191',
            'lrn' => 'required|string|max:191|unique:students',
            'last_name' => 'required|string|max:191',
            'first_name' => 'required|string|max:191',
        ]);

        return Student::create([
            'learner_type'=>$request['learner_type'],
            'lrn'=>$request['lrn'],
            'last_name'=>$request['last_name'],
            'first_name'=>$request['first_name'],
            'middle_name'=>$request['middle_name'],
            'extension'=>$request['extension'],
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