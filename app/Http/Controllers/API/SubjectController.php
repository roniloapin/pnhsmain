<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;


class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Subject::orderBy('subject', 'asc')->paginate(20);

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
            'subject' => 'required|string|max:191|unique:subjects',
        ]);

        return Subject::create([
            'subject'=>$request['subject'],
            'subject_code'=>$request['subject_code'],
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
        $subject = Subject::findOrFail($id);

        $this->validate($request,[
            'subject' => 'required|string|max:191',
        ]);

        $subject->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subject = Subject::findOrFail($id);
        $subject->delete();
    }

    public function search(){
        if ($search = \Request::get('x')){
            $subjects = Subject::where(function($query) use ($search){
                $query->where('subject', 'LIKE', "%$search%");
            })->orderBy('subject', 'asc')->paginate(20);
        }else{
            $subjects = Subject::orderBy('subject', 'asc')->paginate(10);
        }
        return $subjects;
    }
}
