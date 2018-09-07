<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\HomeController;

class Index extends HomeController
{

    public function action()
    {
        return view('AdminPanel.index');
    }
}
