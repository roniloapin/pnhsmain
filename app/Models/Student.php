<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Strand;
use App\Models\LearnerType;
use App\Models\MotherTongue;
use App\Models\Religion;
use App\Models\SchoolYear;

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
        'picture',
        'status',
    ];

    public function strand(){
    	return $this->belongsTo(\App\Models\Strand::class);
    }

    public function learner_type(){
    	return $this->belongsTo(\App\Models\LearnerType::class);
    }

    public function mother_tongue(){
    	return $this->belongsTo(\App\Models\MotherTongue::class);
    }

    public function religion(){
    	return $this->belongsTo(\App\Models\Religion::class);
    }

    public function schoolyear(){
    	return $this->belongsTo(\App\Models\Schoolyear::class);
    }


    // public function religion(){
    // 	return $this->hasOne('App\Models\Religion');
    // }
}
