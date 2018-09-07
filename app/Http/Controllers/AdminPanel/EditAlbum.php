<?php

namespace App\Http\Controllers\AdminPanel;

use App\Album;
use App\Http\Controllers\HomeController;

class EditAlbum extends HomeController
{

    public function action(Album $album)
    {
        return view('AdminPanel.editAlbum', ['album' => $album]);
    }
}
