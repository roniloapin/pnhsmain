<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Strand;

class StrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Strand::orderBy('strand_name', 'asc')->paginate(20);
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
            'strand_name' => 'required|string|max:191|unique:strands',
        ]);

        return Strand::create([
            'strand_name'=>$request['strand_name'],
            'strand_code'=>$request['strand_code'],
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
        $strand = Strand::findOrFail($id);

        $this->validate($request,[
            'strand_name' => 'required|string|max:191',
        ]);

        $strand->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $strand = Strand::findOrFail($id);
        $strand->delete();
    }

    public function search(){
        if ($search = \Request::get('t')){
            $strands = Strand::where(function($query) use ($search){
                $query->where('strand_name', 'LIKE', "%$search%")
                ->orWhere('strand_code', 'LIKE', "%$search%");
            })->orderBy('strand_name', 'asc')->paginate(20);
        }else{
            $strands = Strand::orderBy('strand_name', 'asc')->paginate(10);
        }
        return $strands;
    }
}

//SEARCH T
