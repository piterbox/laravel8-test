<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'patronymic',
        'date_of_birth',
        'group_id'
    ];

    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id');
    }

    public function getGroupNumberAttribute()
    {
        return $this->group->number;
    }

}
