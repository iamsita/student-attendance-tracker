<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'student_id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'class_name'
    ];

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}
