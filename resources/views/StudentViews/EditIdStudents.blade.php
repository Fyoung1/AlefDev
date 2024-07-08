@extends('app')
@section('content')
    <h2>Список принадлежности студентов к классам и прослушанных лекций</h2>
    <form action="{{ route('students.update', $studentEdit['student']->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Имя студента</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $studentEdit['student']->name }}">
        </div>
        <div class="form-group">
            <label for="email">Email студента</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $studentEdit['student']->email }}">
        </div>
        <div class="form-group">
            <label for="grade_id">Класс</label>
                <input type="grade" class="form-control" id="grade" name="grade" value="{{ $studentEdit['grade']->name }}">
        </div>
        <div class="form-group">
            <label for="lectures">Прослушанные лекции</label>
                @foreach ($studentEdit['lectures'] as $lecture)
                <input type="lecture" class="form-control" id="lecture" name="lecture" value="{{ $lecture->topic }}">
                @endforeach
        </div>
        <button type="submit" class="btn btn-primary">Сохранить изменения</button>
    </form>

@endsection
