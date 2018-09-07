@extends('/template')

@section('title', 'Регистрация')

@section('content')

    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
        @csrf

        Имя<br>
        <input type="text" name="name" value="{{ old('name') }}" required autofocus><br>
        @if ($errors->has('name'))
            <strong>{{ $errors->first('name') }}</strong><br>
        @endif

        E-Mail адрес<br>
        <input type="text" name="email" value="{{ old('email') }}" required><br>
        @if ($errors->has('email'))
            <strong>{{ $errors->first('email') }}</strong><br>
        @endif

        Пароль<br>
        <input type="password" name="password" required><br>
        @if ($errors->has('password'))
            <strong>{{ $errors->first('password') }}</strong><br>
        @endif

        Повтор пароля<br>
        <input type="password" name="password_confirmation" required><br>
        <br>

        <button class="btn btn-primary" type="submit">Зарегистрироваться</button>
    </form>

@endsection
