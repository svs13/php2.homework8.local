<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\HomeController;
use App\Song;

class DeleteSong extends HomeController
{

    public function action(Song $song)
    {
        if ($song->exists) {
            $song->delete();
        }
        return redirect('/adminPanel');
    }
}
