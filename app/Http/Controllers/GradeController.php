<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grade;

class GradeController extends Controller
{
    public function CallModelToAddDataDb(Request $request)
    {
        // Получаем данные из запроса
        $name = $request->input('name');

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $grade = new Grade();
        $grade->addGradeToDb($name);

        return response()->json([
            'message' => 'Grade added successfully',
        ], 201);
    }
    public function CallModelToGetDataGrades()
    {
        $grade = Grade ::getGrades();
        return view('GradeViews.GradesPage', compact('grade',));
    }

    public function CallModelToDeleteGradeDb(Grade $grade)
    {
        $grade->delete();

        return redirect()->route('welcome')->with('success', 'Класс успешно удален.');
    }
}
