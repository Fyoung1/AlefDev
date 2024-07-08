<?php

namespace App\Services;

use App\Models\Student;
use App\Models\Grade;
use App\Models\GradeStudents;

class StudentsGradeService
{
    public function getAllStudentsAndGrades()
    {
        $students = Student::all();
        $grades = Grade::all();

        return [
            'students' => $students,
            'grades' => $grades,
        ];
    }

    public function addStudentToGrade($studentId, $gradeId)
    {
        $studentGrade = GradeStudents::firstOrCreate(
            ['students_id' => $studentId, 'grade_id' => $gradeId]
        );
    }
}
