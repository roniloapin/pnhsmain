<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Religion;

class ReligionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Religion::orderBy('religion_name', 'asc')->paginate(20);
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
            'religion_name' => 'required|string|max:191|unique:religions',
        ]);

        return Religion::create([
            'religion_name'=>$request['religion_name'],
            'religion_code'=>$request['religion_code'],
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
        $religion = Religion::findOrFail($id);

        $this->validate($request,[
            'religion_name' => 'required|string|max:191',
        ]);

        $religion->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $religion = Religion::findOrFail($id);
        $religion->delete();
    }

    public function search(){
        if ($search = \Request::get('r')){
            $religions = Religion::where(function($query) use ($search){
                $query->where('religion_name', 'LIKE', "%$search%")
                ->orWhere('religion_code', 'LIKE', "%$search%");
            })->orderBy('religion_name', 'asc')->paginate(20);
        }else{
            $religions = Religion::orderBy('religion_name', 'asc')->paginate(10);
        }
        return $religions;
    }
}

//SEARCH R