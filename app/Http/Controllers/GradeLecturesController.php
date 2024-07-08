<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GradeLecturesService;


class GradeLecturesController extends Controller
{

    protected $gradeLecturesService;

    public function __construct(GradeLecturesService $gradeLecturesService)
    {
        $this->gradeLecturesService = $gradeLecturesService;
    }

    public function CallServicesToGetGradeToLectures()
    {
        $data = $this->gradeLecturesService->getAllGradeAndLectures();

        return view('GradeViews.addGradeLectures', $data);
    }

    public function CallServicesToAddGradeToLectures(Request $request)
    {
        $lecturesId = $request->input('lecture_id');
        $gradeId = $request->input('grade_id');

        $this->gradeLecturesService->addGradeToLectures($lecturesId, $gradeId);

        return redirect()->route('welcome');
    }
}
