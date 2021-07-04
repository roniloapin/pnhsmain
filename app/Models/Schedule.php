<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'subject_id',
        'time_start',
        'time_end',
        'room_id',
        'key_stage',
        'grade_level',
        'strand_id',
        'day',
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
    
}
