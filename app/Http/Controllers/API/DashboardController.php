<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;
use App\Models\Announcement;
use App\Models\PublicAnnouncement;
use App\Models\Schedule;


class DashboardController extends Controller
{
    public function index()
 	{
        // return User::all();
 		$userCount = User::get()->count();
        $studentCount = Student::get()->count();
        $announcementCount = Announcement::get()->count();
        $publicAnnouncementCount = PublicAnnouncement::get()->count();
        $scheduleCount = Schedule::get()->count();
        
        return response()->json([
            'userCount' => $userCount,
            'studentCount' => $studentCount,
            'announcementCount' => $announcementCount,
            'publicAnnouncementCount' => $publicAnnouncementCount,
            'scheduleCount' => $scheduleCount,
        ]);
 	}
    
}
