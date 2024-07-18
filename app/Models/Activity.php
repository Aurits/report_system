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
        'topic_id',
        'marks_activity_1',
        'marks_activity_2',
        'marks_activity_3',
        'marks_activity_4',
        'marks_activity_5',
    ];

    public function enrollment()
    {
        return $this->belongsTo(Enrollment::class);
    }
}
