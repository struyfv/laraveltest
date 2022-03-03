<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateArtist;
use App\Models\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    public function create(CreateArtist $request){
        $input = $request->all();
        
        $artist = Artist::firstorNew(['name' => $input['name']]);
        $artist->save();
        
        return response()->json(['success' => true, 'message' => 'The artist '. $input['name'].' was successfully added']);
    }
}
