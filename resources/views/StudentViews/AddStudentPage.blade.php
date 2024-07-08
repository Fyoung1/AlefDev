@extends('App')
@section('content')
    <div class="DivWithAddStudent" style="position: relative;margin-top:2.5%;">
        <h3>Страница с добавлением студента: </h3>
        <form id="add-student-form">
            @csrf
            <div>
                <label for="name">Имя:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div>
                <label for="email">Электронная почта:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <button type="submit">Добавить студента</button>
        </form>
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#add-student-form').on('submit', function(e) {
            e.preventDefault(); // Предотвращаем отправку формы по умолчанию

            var formData = $(this).serialize(); // Сериализуем данные формы

            $.ajax({
                url: '/add-student-to-base', // URL-адрес для отправки запроса
                method: 'POST', // Метод запроса (POST или GET)
                data: formData, // Данные для отправки на сервер
                dataType: 'json', // Тип данных, которые ожидаются в ответе
                success: function(response) { // Функция, которая будет вызвана при успешном ответе сервера
                    console.log(response); // Выводим ответ сервера в консоль
                },
                error: function(jqXHR, textStatus, errorThrown) { // Функция, которая будет вызвана при ошибке
                    console.log(textStatus, errorThrown); // Выводим текст ошибки в консоль
                }
            });
        });
    });
</script>
