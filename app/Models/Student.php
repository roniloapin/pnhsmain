<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Strand;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        // 'learner_type',
        // 'lrn',
        // 'last_name',
        // 'first_name',
        // 'middle_name',
        // 'extension',
        'learner_type_id',
        'lrn',
        'last_name',
        'first_name',
        'middle_name',
        'extension',
        'email',
        'date_of_birth',
        'gender',
        'religion_id',
        'psa',
        'indigenous',
        'mother_tongue_id',
        'special_educational',
        'specify_lrn',
        'region',
        'province',
        'house_no_street',
        'city_municipality',
        'barangay',
        'father_name',
        'father_education',
        'father_employment',
        'father_number',
        'mother_name',
        'mother_education',
        'mother_employment',
        'mother_number',
        'guardian_name',
        'guardian_education',
        'guardian_employment',
        'guardian_number',
        'key_stage',
        'jhs_grade_level',
        'strand_id',
        'schoolyear_id',
        'requirement',
        'status',
    ];

    public function strand(){
    	return $this->belongsTo('App\Models\Strand');
    }



    public function religion(){
    	return $this->hasOne('App\Models\Religion');
    }
}
