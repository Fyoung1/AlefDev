<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];

    public function addGradeToDb($name)
    {
        $grade = new Grade();
        $grade->name = $name;
        $grade->save();
        return $grade;
    }

    static function getGrades()
    {
        return Grade::all();
    }
}
