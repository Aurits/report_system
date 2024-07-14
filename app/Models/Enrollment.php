<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'academic_year_id',
        'term_id',
        'class_id',
        'stream_id',
        'subject_id',
        'house_id',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function academicYear()
    {
        return $this->belongsTo(AcademicYear::class);
    }

    public function term()
    {
        return $this->belongsTo(Term::class);
    }

    public function classModel()
    {
        return $this->belongsTo(ClassModel::class, 'class_id');
    }

    public function stream()
    {
        return $this->belongsTo(Stream::class);
    }
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function house()
    {
        return $this->belongsTo(House::class);
    }

    public function marks()
    {
        return $this->hasMany(Mark::class);
    }
}
