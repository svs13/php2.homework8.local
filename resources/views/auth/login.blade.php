@extends('/template')

@section('title', 'Авторизация')

@section('content')

    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
        @csrf

        E-Mail адрес<br>
        <input type="email" name="email" value="{{ old('email') }}" required autofocus><br>
        @if ($errors->has('email'))
            <strong>{{ $errors->first('email') }}</strong><br>
        @endif

        Пароль<br>
        <input type="password" name="password" required><br>
        @if ($errors->has('password'))
            <strong>{{ $errors->first('password') }}</strong><br>
        @endif

        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>Remember Me<br>
        <br>

        <button class="btn btn-primary" type="submit">Вход</button><br>
        <br>

    </form>

    <a href="{{ route('password.request') }}">Забыли пароль?</a><br>
    <a href="{{ route('register') }}">Регистрация</a>

@endsection
