<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = "students";
    protected $fillable = [
        'student_id',
        'first_name',
        'last_name',
        'email'
    ];
    public function todayAttendance()
    {
        return $this->hasOne('App\StudentAttendance', 'student_id')->whereDate('date_time', new \DateTime('today'));
    }
}
