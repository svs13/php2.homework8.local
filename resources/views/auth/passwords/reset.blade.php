@extends('/template')

@section('title', 'Сброс пароля')

@section('content')

    <form method="POST" action="{{ route('password.request') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}"><br>

        E-Mail адрес<br>
        <input type="email" name="email" value="{{ $email ?? old('email') }}" required autofocus><br>
        @if ($errors->has('email'))
            <strong>{{ $errors->first('email') }}</strong><br>
        @endif

        Новый пароль<br>
        <input type="password" name="password" required><br>
        @if ($errors->has('password'))
            <strong>{{ $errors->first('password') }}</strong><br>
        @endif

        Повтор пароля<br>
        <input type="password" name="password_confirmation" required><br>
        <br>

        <button class="btn btn-primary" type="submit">Сохранить</button>
    </form>

@endsection
