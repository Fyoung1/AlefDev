<?php

namespace App\Http\Controllers;

use App\Models\Lecture;
use Illuminate\Http\Request;

class LectureController extends Controller
{
    public function CallModelToAddDataDb(Request $request)
    {
        // Получаем данные из запроса
        $topic = $request->input('topic');
        $description = $request->input('description');

        $request->validate([
            'topic' => 'required|string|max:255|unique:lectures',
            'description' => 'required|string|max:255',
        ]);

        $lecture = new Lecture();
        $lecture->addLectureToDb($topic, $description);

        return response()->json([
            'message' => 'Lecture added successfully',
        ], 201);
    }
    public function CallModelToGetDataLecture()
    {
        $lecture = Lecture ::getLectures();
        return view('LectureViews.LecturePage', compact('lecture',));
    }
    public function CallModelToDeleteLectureDb(Lecture $lecture)
    {
        $lecture->delete();

        return redirect()->route('welcome')->with('success', 'Лекция успешно удалена.');
    }
}
