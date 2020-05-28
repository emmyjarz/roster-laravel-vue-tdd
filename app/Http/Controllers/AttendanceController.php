<?php

namespace App\Http\Controllers;

use App\Student;
use Validator;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Resources\Student as StudentResource;

class AttendanceController extends Controller
{
    public function index()
    {
        try {
            $students = Student::orderBy('first_name')->paginate(10);
            return StudentResource::collection($students);
        } catch (\Exception $e) {
            response()->json([
                'error' => $e->getMessage(),
                'status' => 'error'
            ], 500);
        }
    }
    public function checkAttendance(Request $request, Student $student)
    {
        //Validation
        $validator = Validator::make($request->all(), [
            'is_present' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors(),
                'status' => 'error',
            ], 422);
        }
        $data = $request->all();
        $data['date_time'] = Carbon::now();
        try {
            $attendence = $student->todayAttendance;
            empty($attendence) ? $student->todayAttendance()->create($data) : $attendence->update($data);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'status' => 'error'
            ], 500);
        }
        return response()->json([
            'status' => 'success'
        ], 200);
    }
}
