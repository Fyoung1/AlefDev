@extends('app')
@section('content')
    <h2>Список студентов</h2>
    @foreach ($student as $students)
        <form action="{{ route('students.destroy', $students->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <p>{{ $students->name }} {{ $students->email }}</p>
            <button type="submit">Удалить</button>
        </form>
    @endforeach
@endsection
