<?php

namespace App\Http\Controllers\AdminPanel;

use App\Album;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;

class SaveAlbum extends HomeController
{

    public function action(Request $request)
    {

        if (isset($request->id)) {
            $album = Album::find($request->id);
        } else {
            $album = new Album();
        }

        $this->validate($request, [
            'name' => 'required|max:200',
            'year' => 'required|date_format:"Y"',
            'image' => 'max:1100000|mimes:jpeg,jpg'
        ], [
            'name.required' => 'Имя альбома не задано',
            'name.max' => 'Имя альбома слишком велико',
            'year.required' => 'Год альбома не задан',
            'year.date_format' => 'Год альбома должен соответствовать формату 1234',
            'image.max' => 'Изображение должно быть размером не более 1 МБайта ',
            'image.mimes' => 'Изображение должно быть типа jpeg, jpg',
        ]);

        $album->name = $request->name;
        $album->year = $request->year;

        if (!isset($album->image)) {
            $album->image = 'noImage.jpg';
        }

        if($request->hasFile('image')) {

            if (!$album->exists) {
                $album->save(); //get id
            }

            $name = 'album' . $album->id . '.jpg';
            $request->file('image')->move(Album::getPathImages(), $name);

            $album->image = $name;
        }

        $album->save();

        return redirect('/adminPanel');
    }
}
