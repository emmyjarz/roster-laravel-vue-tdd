<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AttendanceTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function attendanceCanBeCreated()
    {
        $student = factory('App\Student', 1)->create();
        $studentId = $student->first()->id;
        $attendanceData = [
            'is_present' => 1,
        ];

        $this->put("/api/student-attendances/$studentId", $attendanceData)->assertOk();
        $this->assertDatabaseHas('student_attendances', $attendanceData + ['student_id' => $studentId]);
    }
    /** @test */
    public function isPresentIsRequired()
    {
        $student = factory('App\Student', 1)->create();
        $studentId = $student->first()->id;

        $this->put("/api/student-attendances/$studentId", [
            'is_present' => null,
        ])->assertStatus(422);
    }
    /** @test */
    public function isPresentCanBeUpdated()
    {
        $student = factory('App\Student', 1)->create();
        $studentId = $student->first()->id;

        $this->put("/api/student-attendances/$studentId", [
            'is_present' => true,
        ]);
        $this->put("/api/student-attendances/$studentId", [
            'is_present' => false,
        ]);
        $this->assertDatabaseHas('student_attendances', [
            'is_present' => false,
            'student_id' => $studentId
        ]);
    }
}
