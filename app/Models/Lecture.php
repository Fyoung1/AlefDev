<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    use HasFactory;
    protected $fillable = [
        'topic',
        'description'
    ];
    public function addLectureToDb($topic,$description)
    {
        $lecture = new Lecture();
        $lecture->topic = $topic;
        $lecture->description = $description;
        $lecture->save();
        return $lecture;
    }

    static function getLectures()
    {
        return Lecture::all();
    }

}
