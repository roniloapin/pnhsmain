<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MotherTongue;

class MotherTongueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return MotherTongue::orderBy('mother_tongue', 'asc')->paginate(20);
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
            'mother_tongue' => 'required|string|max:191|unique:mother_tongues',
        ]);

        return MotherTongue::create([
            'mother_tongue'=>$request['mother_tongue'],
            'mother_tongue_code'=>$request['mother_tongue_code'],
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
        $mother_tongue = MotherTongue::findOrFail($id);

        $this->validate($request,[
            'mother_tongue' => 'required|string|max:191',
        ]);

        $mother_tongue->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mother_tongue = MotherTongue::findOrFail($id);
        $mother_tongue->delete();
    }

    public function search(){
        if ($search = \Request::get('s')){
            $mother_tongues = MotherTongue::where(function($query) use ($search){
                $query->where('mother_tongue', 'LIKE', "%$search%")
                ->orWhere('mother_tongue_code', 'LIKE', "%$search%");
            })->orderBy('mother_tongue', 'asc')->paginate(20);
        }else{
            $mother_tongues = MotherTongue::orderBy('mother_tongue', 'asc')->paginate(10);
        }
        return $mother_tongues;
    }
}
