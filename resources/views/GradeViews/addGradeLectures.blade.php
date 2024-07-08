@extends('app')
@section('content')
    <h2>Добавление прослушанных лекций в класс</h2>

    <form action="/lecture/add-to-grade" method="POST">
        @csrf

        <div>
            <label for="lecture_id">Лекция:</label>
            <select name="lecture_id" id="lecture_id">
                @foreach ($lectures as $lecture)
                    <option value="{{ $lecture->id }}">{{ $lecture->topic }}</option>
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
