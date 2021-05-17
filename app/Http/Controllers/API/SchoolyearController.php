<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schoolyear;

class SchoolyearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Schoolyear::orderBy('schoolyear', 'asc')->paginate(20);
        // $schoolyears = Schoolyear::where('schoolyear_status', 'Active')->get();
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
            'schoolyear' => 'required|string|max:191|unique:schoolyears',
        ]);

        return Schoolyear::create([
            'schoolyear'=>$request['schoolyear'],
            'schoolyear_status'=>$request['schoolyear_status'],
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
        $schoolyear = Schoolyear::findOrFail($id);

        $this->validate($request,[
            'schoolyear' => 'required|string|max:191',
        ]);

        $schoolyear->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $schoolyear = Schoolyear::findOrFail($id);
        $schoolyear->delete();
    }

}

//searh V last
