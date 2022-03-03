<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateSong;
use App\Models\Album;
use App\Models\Song;
use Illuminate\Http\Request;

class SongController extends Controller
{
    public function create(CreateSong $request){
        $input = $request->all();
        
        $album = Album::find($input['album_id']);

        if($album){
            $song = Song::firstorNew(['name' => $input['name']]);
            $song->album_id = $input['album_id'];
            $song->length = $input['length'];
            $song->save();
    
            return response()->json(['success' => true, 'message' => 'The song '. $input['name'].' was successfully added']);
        }


        return response()->json(['success' => false, 'message' => 'The album doesn\'t exists']);
    }

    public function delete($id){
        $song = Song::find($id);

        if($song){
            $song->delete();

            return response()->json(['success' => true, 'message' => 'The song '. $song->name.' was successfully deleted']);
        } 

        return response()->json(['success' => false, 'message' => 'The song could not be found']);

    }
}
