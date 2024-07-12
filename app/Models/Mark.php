<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'subject_id', 'exam_id', 'activity_id', 'marks_obtained', 'term_id', 'assessment_type'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
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
