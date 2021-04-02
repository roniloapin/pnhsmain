<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LearnerType extends Model
{
    use HasFactory;

    protected $fillable = [
        'learner_type','learner_type_code',
    ];
}
