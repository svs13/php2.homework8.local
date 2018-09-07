<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Album extends Model
{

    public $timestamps = false;

    static public function getPathImages()
    {
        return public_path() . '/images/';
    }

    public function songs()
    {
        return $this->hasMany('App\Song');
    }

    public function delete()
    {
        $this->deleteSongs();
        $this->deleteImage();

        return parent::delete();
    }

    protected function deleteSongs()
    {
        foreach ($this->songs()->get() as $song) {
            $song->delete();
        }
    }

    protected function deleteImage()
    {
        $path = static::getPathImages() . $this->image;

        File::delete($path);
    }

}
