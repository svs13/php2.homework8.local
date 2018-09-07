<?php

namespace App\Http\Controllers\AdminPanel;

use App\Album;
use App\Http\Controllers\HomeController;
use App\Song;

class EditSong extends HomeController
{

    public function action(Song $song)
    {
        $albums = Album::all();
        return view('AdminPanel.editSong', ['song' => $song, 'albums' => $albums]);
    }
}
