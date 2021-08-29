<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SystemSetting;


class SystemSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return SystemSetting::all();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $system = SystemSetting::find($id);
        $system->sys_name = $request->sys_name;

        if ($request->sys_logo != null){
            $system->sys_logo = 'logo.png';
            
            $path = public_path().'/img/logo.png';
            if (file_exists($path)) {
                unlink($path);
            }
        }

        if($system->save()){
            if ($request->sys_logo != null){
                $folderPath = public_path()."/img"; 

                $image_parts = explode(";base64,", $request->sys_logo); 
                $image_type_aux = explode("image/", $image_parts[0]); 
                $image_type = $image_type_aux[1]; 
                $image_base64 = base64_decode($image_parts[1]); 
                $file = $folderPath.'/logo.png'; 
                
                file_put_contents($file, $image_base64);
            }
        }
        // $system->sys_logo = $request->sys_logo;
        // $system->save();
        return response()->json([
            'base64' => $request->sys_logo,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
