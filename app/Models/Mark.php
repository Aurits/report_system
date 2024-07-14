<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    use HasFactory;

    protected $fillable = [
        'enrollment_id',
        'exam_id',
        'activity_id',
        'marks_obtained',
        'term_id',
        'assessment_type',
    ];

    public function enrollment()
    {
        return $this->belongsTo(Enrollment::class);
    }

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

    public function term()
    {
        return $this->belongsTo(Term::class);
    }
}
