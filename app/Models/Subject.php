<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject','subject_code',
    ];

    public function schedule(){
    	return $this->hasMany('App\Models\Schedule', 'subject_id',);
    }
}
