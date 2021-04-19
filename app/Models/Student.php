<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'learner_type',
        'lrn',
        'last_name',
        'first_name',
        'middle_name',
        'extension',
    ];

    public function strand(){
    	return $this->belongsTo('App\Models\Strand');
    }
}
