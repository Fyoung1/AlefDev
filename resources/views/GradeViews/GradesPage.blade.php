@extends('app')
@section('content')
    <h2>Список классов</h2>
    @foreach ($grade as $grades)
        <form action="{{ route('grades.destroy', $grades->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <p>{{ $grades->name }}</p>
            <button type="submit">Удалить</button>
        </form>
    @endforeach
@endsection
