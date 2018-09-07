@extends('/template')

@section('title', 'Админ-панель')

@section('content')

        @foreach (\App\Album::all() as $album)
        <h3>Альбом: {{ $album->name }} </h3>

        <img class="w-25 d-block" src="{{asset('/images/' . $album->image)}}"><br>
        Год: {{ $album->year }}<br>
        Id: {{ $album->id }}<br>

        <table>
            <tr>
                <td>
                    <form action="/adminPanel/editAlbum/{{ $album->id }}" method="get">
                        <input class="btn btn-primary" type="submit" value="Изменить">
                    </form>
                </td>
                <td>
                    <form class="w-25" action="/adminPanel/deleteAlbum/{{ $album->id }}">
                        <input class="btn btn-danger" type="submit" value="Удалить">
                    </form>
                </td>
            </tr>
        </table>
        <br>

        <h5>Песни</h5>

        <table class="table table-bordered">
            <tr>
                <th style="width: 1%">id</th>
                <th>Название</th>
                <th style="width: 1%">Год</th>
                <th style="width: 1%">Длительность</th>
                <th style="width: 1%">Изменение</th>
                <th style="width: 1%">Удаление</th>
            </tr>

            @foreach ($album->songs()->get() as $song)
            <tr>
                <td>{{ $song->id }}</td>
                <td style="word-break: break-all;">{{ $song->name }}</td>
                <td>{{ $song->year }}</td>
                <td>{{ $song->duration }}</td>
                <td>
                    <form action="/adminPanel/editSong/{{ $song->id }}">
                        <input class="btn btn-primary" type="submit" value="Изменить">
                    </form>
                </td>
                <td>
                    <form action="/adminPanel/deleteSong/{{ $song->id }}">
                        <input class="btn btn-danger"  type="submit" value="Удалить">
                    </form>
                </td>
            </tr>
            @endforeach

        </table>

        @endforeach



    <br>

    <form action="/adminPanel/editAlbum" method="get">
        @csrf
        <input class="btn btn-primary w-25" type="submit" value="Добавить альбом">
    </form>
    <br>

    <form action="/adminPanel/editSong">
        <input class="btn btn-primary w-25" type="submit" value="Добавить песню">
    </form>
    <br>

@endsection