@extends('/template')

@section('title', 'Ошибка')

@section('content')
    Произошла ошибка.<br>
    Код ошибки: {{ $exception->getStatusCode() }}<br>
    Сообщение: {{ $exception->getMessage() }}<br>
    <a href="/">Вернуться на главную</a>
@endsection