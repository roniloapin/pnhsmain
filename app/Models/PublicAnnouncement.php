<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicAnnouncement extends Model
{
    use HasFactory;
    protected $fillable = [
        'posting_date','publicannouncement',
    ];
}
