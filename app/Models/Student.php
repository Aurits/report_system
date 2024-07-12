<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'gender'];

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
}
