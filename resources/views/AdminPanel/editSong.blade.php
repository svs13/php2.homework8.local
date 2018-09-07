@extends('/template')

@section('title', 'Редактирование песни')

@section('content')

    <!-- Ошибки валидации -->

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Форма редактирования песни -->

    <form class="p-2" action="/adminPanel/saveSong" method="post">
        @csrf

        <input type="hidden" name="id" value="{{ $song->id ?? null }}"><br>

        Имя:<br>
        <input type="text" name="name" value="{{ old('name') ?? $song->name ?? null  }}"><br>

        Год:<br>
        <input type="text" name="year" value="{{ old('year') ?? $song->year ?? null  }}"><br>

        Длительность:<br>
        <input type="text" name="duration" value="{{ old('duration') ?? $song->duration ?? null  }}"><br>

        Альбом:<br>
        <select name="album_id">
            @foreach ($albums as $album)
                <option value="{{ $album->id }}"
                    @if ($album->id === $song->album_id) selected @endif
                >
                    {{ $album->name }}
                </option>
            @endforeach
        </select><br>
        <br>

        <input class="btn btn-primary" type="submit" value="Сохранить">
    </form>

@endsection