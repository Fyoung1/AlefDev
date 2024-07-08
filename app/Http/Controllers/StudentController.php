<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Services\StudentsGradeService;

class StudentController extends Controller
{
    public function CallModelToGetDataStudents()
    {
        $student = Student ::getStudents();
        return view('StudentViews.StudentsPage', compact('student',));
    }

    public function CallModelToAddDataDb(Request $request)
    {
        // Получаем данные из запроса
        $name = $request->input('name');
        $email = $request->input('email');

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:students',
        ]);

        $student = new Student();
        $student->addStudentToDb($name, $email);

        return response()->json([
            'message' => 'Student added successfully',
        ], 201);
    }

    public function CallModelToDeleteStudentDb(Student $student)
    {
        $student->delete();

        return redirect()->route('welcome')->with('success', 'Студент успешно удален.');
    }
}
