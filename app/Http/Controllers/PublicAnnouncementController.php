<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PublicAnnouncement;


class PublicAnnouncementController extends Controller
{
    public function index(){
        $data = PublicAnnouncement::orderBy('posting_date', 'asc')->paginate(50); 

        return view('announcement',['announcement'=>$data]);
        PublicAnnouncement::all();
    }
}
