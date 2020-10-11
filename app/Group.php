<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
        'number',
        'course',
        'faculty',
    ];

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
