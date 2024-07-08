<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\StudentsGradeService;


class StudentGradeController extends Controller
{

    protected $studentsGradeService;

    public function __construct(StudentsGradeService $studentsGradeService)
    {
        $this->studentsGradeService = $studentsGradeService;
    }

    public function CallServicesToGetStudentsToGrade()
    {
        $data = $this->studentsGradeService->getAllStudentsAndGrades();

        return view('StudentViews.addStudentToGrade', $data);
    }

    public function CallServicesToAddStudentsToGrade(Request $request)
    {
        $studentId = $request->input('student_id');
        $gradeId = $request->input('grade_id');

        $this->studentsGradeService->addStudentToGrade($studentId, $gradeId);

        return redirect()->route('welcome');
    }
}
