<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function marks()
    {
        return $this->hasMany(Mark::class);
    }
    public function activities()
    {
        return $this->hasMany(Activity::class);
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }
}
