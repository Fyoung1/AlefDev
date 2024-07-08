<?php

namespace App\Services;

use App\Models\GradeLectures;
use App\Models\Lecture;
use App\Models\Student;
use App\Models\Grade;
use App\Models\GradeStudents;


class AttachmentStudentsService
{
    public function getAllStudents()
    {
        $gradeStudents = GradeStudents::all();

        $students = [];

        foreach ($gradeStudents as $gradeStudent) {
            $student = Student::findOrFail($gradeStudent->students_id);
            $grade = Grade::findOrFail($gradeStudent->grade_id);
            $gradeLectures = GradeLectures::where('grade_id', $gradeStudent->grade_id)->get();
            $lectures = [];
            foreach ($gradeLectures as $gradeLecture) {
                $lecture = Lecture::findOrFail($gradeLecture->lecture_id);
                $lectures[] = $lecture;
            }

            $students[] = [
                'student' => $student,
                'grade' => $grade,
                'lectures' => $lectures
            ];
        }
        return $students;
    }

    public function EditForIdStudents($studentId)
    {
        $gradeStudent = GradeStudents::where('students_id', $studentId)->firstOrFail();

        $student = Student::findOrFail($gradeStudent->students_id);
        $grade = Grade::findOrFail($gradeStudent->grade_id);
        $gradeLectures = GradeLectures::where('grade_id', $gradeStudent->grade_id)->get();
        $lectures = [];
        foreach ($gradeLectures as $gradeLecture) {
            $lecture = Lecture::findOrFail($gradeLecture->lecture_id);
            $lectures[] = $lecture;
        }

        return [
            'student' => $student,
            'grade' => $grade,
            'lectures' => $lectures
        ];
    }

    public function UpdateDateDb($request, $studentId)
    {
        $student = Student::findOrFail($studentId);
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $grade = Grade::findOrFail($studentId);
        $grade->name = $request->input('name');
        $student->save();
        $grade->save();


        // Обновление связи студента с классом
        $student->grade()->associate(Grade::findOrFail($request->input('grade_id')));
    }
}
