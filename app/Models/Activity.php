<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'enrollment_id',
        'marks_aoi',
        'marks_activity_2',
        'marks_activity_3',
        'marks_activity_3',
        'marks_activity_3',
        'marks_activity_3',
        'assessment_type',
    ];

    public function enrollment()
    {
        return $this->belongsTo(Enrollment::class);
    }
}
