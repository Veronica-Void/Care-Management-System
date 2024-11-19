<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class additionalPatientInfo extends Model
{
    use HasFactory;
        protected $table = 'additional_patient_infos';
}
