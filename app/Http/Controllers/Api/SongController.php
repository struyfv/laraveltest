<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateSong;
use App\Models\Song;
use Illuminate\Http\Request;

class SongController extends Controller
{
    public function create(CreateSong $request){
        $input = $request->all();
        
        $song = Song::firstorNew(['name' => $input['name']]);
        $song->album_id = $input['album_id'];
        $song->length = $input['length'];
        $song->save();
        return response()->json(['success' => true, 'message' => 'The song '. $input['name'].' was successfully added']);
    }
}
