<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function subject(){
    	return $this->hasOne('App\Models\Subject');
    }
    public function room(){
    	return $this->hasOne('App\Models\Room');
    }
    public function strand(){
    	return $this->hasOne('App\Models\Strand');
    }
}
