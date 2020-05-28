<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentAttendance extends Model
{
    protected $table = "student_attendances";
    protected $fillable = [
        'student_id',
        'date_time',
        'is_present',
    ];
}
