@extends('/template')

@section('title', 'Редактирование альбома')

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

    <!-- Форма редактирования альбома -->

    <form class="p-2" action="/adminPanel/saveAlbum" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $album->id ?? null }}"><br>

        Изображение:<br>
        <input type="file" name="image"><br>

        Имя:<br>
        <input type="text" name="name" value="{{ old('name') ?? $album->name ?? null  }}"><br>

        Год:<br>
        <input type="text" name="year" value="{{ old('year') ?? $album->year ?? null  }}"><br>
        <br>

        <input class="btn btn-primary" type="submit" value="Сохранить">
    </form>

@endsection