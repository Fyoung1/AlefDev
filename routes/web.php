<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\LectureController;
use App\Http\Controllers\StudentGradeController;
use App\Http\Controllers\GradeLecturesController;
use App\Http\Controllers\AttachmentStudentsController;

Route::view('/', 'welcome')->name('welcome');
Route::GET('/getAllAttachmentStudents', [AttachmentStudentsController::class, 'CallServicesToGetAttachmentStudents']);

Route::get('/addStudent', function () {
    return view('StudentViews.AddStudentPage');
});

Route::get('/addGrade', function () {
    return view('GradeViews.AddGradePage');
});

Route::get('/addLecture', function () {
    return view('LectureViews.AddLecturePage');
});


Route::GET('/getStudents', [StudentController::class, 'CallModelToGetDataStudents']);
Route::GET('/getGrades', [GradeController::class, 'CallModelToGetDataGrades']);
Route::GET('/getLectures', [LectureController::class, 'CallModelToGetDataLecture']);
Route::GET('/addStudentToGrade', [StudentGradeController::class, 'CallServicesToGetStudentsToGrade']);
Route::GET('/getLecturesToGrade', [GradeLecturesController::class, 'CallServicesToGetGradeToLectures']);



Route::POST('/add-student-to-base', [StudentController::class, 'CallModelToAddDataDb']);
Route::POST('/add-grade-to-base', [GradeController::class, 'CallModelToAddDataDb']);
Route::POST('/add-lecture-to-base', [LectureController::class, 'CallModelToAddDataDb']);
Route::POST('/students/add-to-grade',[StudentGradeController::class, 'CallServicesToAddStudentsToGrade']);
Route::POST('/lecture/add-to-grade',[GradeLecturesController::class, 'CallServicesToAddGradeToLectures']);
Route::delete('/students/{student}', [StudentController::class,'CallModelToDeleteStudentDb'])->name('students.destroy');
Route::delete('/grades/{grade}', [GradeController::class,'CallModelToDeleteGradeDb'])->name('grades.destroy');
Route::delete('/lectures/{lecture}', [LectureController::class,'CallModelToDeleteLectureDb'])->name('lectures.destroy');

Route::get('/students/{student}/edit',[AttachmentStudentsController::class,'CallServicesToEditAttachmentStudents'])->name('students.edit');
Route::put('/students/{student}', [AttachmentStudentsController::class, 'CallServicesToUpdateDateDb'])->name('students.update');
