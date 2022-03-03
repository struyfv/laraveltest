<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAlbum;
use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function create(CreateAlbum $request){
        $input = $request->all();
        
        $album = Album::firstorNew(['name' => $input['name']]);
        $album->artist_id = $input['artist_id'];
        $album->price_without_vat = $input['price_without_vat'];
        $album->save();

        return response()->json(['success' => true, 'message' => 'The album '. $input['name'].' was successfully added']);
    }
}
