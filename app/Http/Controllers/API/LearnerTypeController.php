<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LearnerType;

class LearnerTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return LearnerType::orderBy('learner_type', 'asc')->paginate(20);
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
            'learner_type' => 'required|string|max:191|unique:learner_types',
        ]);

        return LearnerType::create([
            'learner_type'=>$request['learner_type'],
            'learner_type_code'=>$request['learner_type_code'],
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
        $learner_type = LearnerType::findOrFail($id);

        $this->validate($request,[
            'learner_type' => 'required|string|max:191',
        ]);

        $learner_type->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $learner_type = LearnerType::findOrFail($id);
        $learner_type->delete();
    }

    public function search(){
        if ($search = \Request::get('q')){
            $learner_types = LearnerType::where(function($query) use ($search){
                $query->where('learner_type', 'LIKE', "%$search%")
                ->orWhere('learner_type_code', 'LIKE', "%$search%");
            })->orderBy('learner_type', 'asc')->paginate(20);
        }else{
            $learner_types = LearnerType::orderBy('learner_type', 'asc')->paginate(10);
        }
        return $learner_types;
    }
}

//SEARCH Q
