@extends('/template')

@section('title', 'Отправка письма')

@section('content')

    Введите адрес e-mail.<br>
    На него будет выслано письмо с дальнейшими действиями.<br>
    <br>

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        E-Mail адрес<br>
        <input type="email" name="email" value="{{ old('email') }}" required><br>
        @if ($errors->has('email'))
            <strong>{{ $errors->first('email') }}</strong><br>
        @endif
        <br>

        <button class="btn btn-primary" type="submit">Отправить</button>
    </form>
    <br>

    @if (session('status'))
        {{ session('status') }}<br>
    @endif

@endsection
