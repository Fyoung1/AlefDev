@extends('app')
@section('content')
    <h2>Список лекций</h2>
    <table>
        <thead>
        <tr>
            <th>Тема</th>
            <th>Описание</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($lecture as $lectures)
            <tr>
                <td>{{ $lectures->topic }}</td>
                <td>{{ $lectures->description }}</td>
                <td>
                    <form action="{{ route('lectures.destroy', $lectures->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
