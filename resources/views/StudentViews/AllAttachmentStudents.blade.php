@extends('app')
@section('content')
    <h2>Список принадлежности студентов к классам и прослушанных лекций</h2>
    <table>
        <thead>
        <tr>
            <th>Имя студента</th>
            <th>Email студента</th>
            <th>Класс</th>
            <th>Прослушанные лекции</th>
            <th>Действия</th>
            <!-- другие заголовки таблицы -->
        </tr>
        </thead>
        <tbody>
        @foreach ($student as $students)
            <tr>
                <td>{{ $students['student']->name }}</td>
                <td>{{ $students['student']->email }}</td>
                <td>{{ $students['grade']->name }}</td>
                <td>
                    @foreach ($students['lectures'] as $lecture)
                        <p>{{ $lecture->topic }}</p>
                    @endforeach
                </td>
                <td>
                    <a href="{{ route('students.edit', $students['student']->id) }}" class="btn btn-primary">Редактировать</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
