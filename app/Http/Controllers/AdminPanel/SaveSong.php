<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\HomeController;
use App\Song;
use Illuminate\Http\Request;

class SaveSong extends HomeController
{

    public function action(Request $request)
    {

        if (isset($request->id)) {
            $song = Song::find($request->id);
        } else {
            $song = new Song();
        }

        $this->validate($request, [
            'name' => 'required|max:200',
            'year' => 'required|date_format:"Y"',
            'duration' => 'required|date_format:"i:s"',
            'album_id' => 'integer'
        ], [
            'name.required' => 'Имя песни не задано',
            'name.max' => 'Имя песни слишком велико',
            'year.required' => 'Год песни не задан',
            'year.date_format' => 'Год песни должен соответствовать формату 1234',
            'duration.required' => 'Длительность песни не задана',
            'duration.date_format' => 'Длительность песни должна соответствовать формату 00:00',
            'album_id.integer' => 'Альбом песни задан не верно',
        ]);

        $song->name = $request->name;
        $song->year = $request->year;
        $song->duration = $request->duration;
        $song->album_id = $request->album_id;

        $song->save();

        return redirect('/adminPanel');
    }
}
