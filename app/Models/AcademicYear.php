<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicYear extends Model
{
    use HasFactory;

    protected $fillable = ['year'];

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }
}
