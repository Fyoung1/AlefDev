<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Services\AttachmentStudentsService;

class AttachmentStudentsController extends Controller
{
    protected $AttachmentStudentsService;

    public function __construct(AttachmentStudentsService $AttachmentStudentsService)
    {
        $this->AttachmentStudentsService = $AttachmentStudentsService;
    }

    public function CallServicesToGetAttachmentStudents()
    {
        $student = $this->AttachmentStudentsService->getAllStudents();
        return view('StudentViews.AllAttachmentStudents',compact('student'));
    }

    public function CallServicesToEditAttachmentStudents($studentId)
    {
        $studentEdit = $this->AttachmentStudentsService->EditForIdStudents($studentId);
        return view('StudentViews.EditIdStudents',compact('studentEdit'));
    }
    public function CallServicesToUpdateDateDb(Request $request,$studentId)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:students,email,' . $studentId,
            'grade_id' => 'required|exists:grades,id',
            'lectures' => 'nullable|array',
            'lectures.*' => 'exists:lectures,id',
        ]);

        $this->AttachmentStudentsService->UpdateDateDb($request, $studentId);
    }
}
