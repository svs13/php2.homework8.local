@extends('/template')

@section('title', 'Альбомы')

@section('content')

    @foreach (\App\Album::all() as $album)
        <h3>Альбом: {{ $album->name }} </h3>

        <img class="w-25 d-block" src="{{asset('/images/' . $album->image)}}">
        Год: {{ $album->year }}<br>
        <br>

        <h5>Песни</h5>

        <table class="table table-bordered w-50">
            <tr>
                <th>Название</th>
                <th style="width: 1%">Год</th>
                <th style="width: 1%">Длительность</th>
            </tr>

            @foreach ($album->songs()->get() as $song)
                <tr>
                    <td>{{ $song->name }}</td>
                    <td>{{ $song->year }}</td>
                    <td>{{ $song->duration }}</td>
                </tr>
            @endforeach

        </table>

    @endforeach

@endsection