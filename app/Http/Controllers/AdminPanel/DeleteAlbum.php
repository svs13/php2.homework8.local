<?php

namespace App\Http\Controllers\AdminPanel;

use App\Album;
use App\Http\Controllers\HomeController;

class DeleteAlbum extends HomeController
{

    public function action(Album $album)
    {
        if ($album->exists) {
            $album->delete();
        }
        return redirect('/adminPanel');
    }

}
