<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Student extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'studentId' => $this->student_id,
            'firstName' => ucwords($this->first_name),
            'lastName' =>  ucwords($this->last_name),
            'email' => $this->email,
            'dateTime' => $this->todayAttendance->date_time ?? null,
            'isPresent' => $this->todayAttendance->is_present ?? null,
        ];
    }
}
