<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email'
    ];

    static function getStudents()
    {
        return Student::all();
    }
    public function addStudentToDb($name, $email)
    {
        $student = new Student();
        $student->name = $name;
        $student->email = $email;
        $student->save();
        return $student;
    }
}
