<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAlbum;
use App\Models\Album;
use App\Models\Artist;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function create(CreateAlbum $request){
        $input = $request->all();

        // check if artist exists

        $artist = Artist::find($input['artist_id']);

        if($artist){
            $album = Album::firstorNew(['name' => $input['name']]);
            $album->artist_id = $input['artist_id'];
            $album->price_without_vat = $input['price_without_vat'];
            $album->save();
    
            return response()->json(['success' => true, 'message' => 'The album '. $input['name'].' was successfully added']);
        }
        
        return response()->json(['success' => false, 'message' => 'The artist doesn\'t exists']);

    }

    public function get($id){
        $album = Album::with('artist','songs')->find($id);

        if($album){
            return response()->json(['success' => true, 'album' => $album->toArray()]);
        }

        return response()->json(['success' => false, 'message' => 'The album doesn\'t exists']);
    }
}
