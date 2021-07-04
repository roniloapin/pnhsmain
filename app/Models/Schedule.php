<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Subject;
use App\Models\Room;
use App\Models\Strand;
use App\Models\User;

class Schedule extends Model
{
    use HasFactory;
    protected $fillable = [
        'key_stage',
        'grade_level',
        'strand_id',
        'subject_id',
        'day',
        'time_start',
        'time_end',
        'room_id',
        'user_id',
    ];

    // public function subject(){
    // 	return $this->hasOne('App\Models\Subject');
    // }
    // public function room(){
    // 	return $this->hasOne('App\Models\Room');
    // }
    // public function strand(){
    // 	return $this->hasOne('App\Models\Strand');
    // }

    public function subject()
    {
    	return $this->belongsTo(Subject::class, 'subject_id');
    }
    public function room()
    {
    	return $this->belongsTo(Room::class, 'room_id');
    }
    public function strand()
    {
    	return $this->belongsTo(Strand::class, 'strand_id');
    }
    public function user()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }
}
