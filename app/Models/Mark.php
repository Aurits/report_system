<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    use HasFactory;

    protected $fillable = [
        'enrollment_id',
        'marks_obtained_1',
        'marks_obtained_2',
        'marks_obtained_3',
        'assessment_type',
    ];

    public function enrollment()
    {
        return $this->belongsTo(Enrollment::class);
    }
}
