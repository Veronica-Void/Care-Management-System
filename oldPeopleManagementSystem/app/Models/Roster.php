<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roster extends Model
{
    use HasFactory;

    // Allow mass assignment for these fields
    protected $fillable = [
        'supervisor_name',
        'doctor_name',
        'caregiver_name',
        'group',
        'date',
    ];
}
