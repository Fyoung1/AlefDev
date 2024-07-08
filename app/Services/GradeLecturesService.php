<?php

namespace App\Services;

use App\Models\GradeLectures;
use App\Models\Lecture;
use App\Models\Student;
use App\Models\Grade;
use App\Models\GradeStudents;


class GradeLecturesService
{
    public function getAllGradeAndLectures()
    {
        $lectures = Lecture::all();
        $grades = Grade::all();

        return [
            'lectures' => $lectures,
            'grades' => $grades,
        ];
    }

    public function addGradeToLectures($lecturesId, $gradeId)
    {
        $studentGrade = new GradeLectures();
        $studentGrade->lecture_id = $lecturesId;
        $studentGrade->grade_id = $gradeId;
        $studentGrade->save();

    }
}
