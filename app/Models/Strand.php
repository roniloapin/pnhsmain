<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Strand extends Model
{
    use HasFactory;
    protected $fillable = [
        'strand_name','strand_code',
    ];

    public function student()
    {
    	return $this->belongsTo('App\Models\Student');
    }

    public function strand(){
    	return $this->hasMany('App\Models\Schedule','strand_id');
    }

}
