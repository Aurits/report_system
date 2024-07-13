<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'name', 'gender', 'email', 'phone'];

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function marks()
    {
        return $this->hasMany(Mark::class);
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }

    public function stream()
    {
        return $this->belongsTo(Stream::class)->withDefault(); // Make stream relationship optional with withDefault()
    }

    public function house()
    {
        return $this->belongsTo(House::class)->withDefault(); // Make house relationship optional with withDefault()
    }
}
