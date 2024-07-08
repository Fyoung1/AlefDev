@extends('app')
@section('content')
    <h2>Добавление студента в класс</h2>

    <form action="/students/add-to-grade" method="POST">
        @csrf
        <div>
            <label for="student_id">Студент:</label>
            <select name="student_id" id="student_id">
                @foreach ($students as $student)
                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="grade_id">Класс:</label>
            <select name="grade_id" id="grade_id">
                @foreach ($grades as $grade)
                    <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit">Добавить</button>
    </form>
@endsection
