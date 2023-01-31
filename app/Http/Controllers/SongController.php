<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $songs = Song::where('estado', 1)->get();
        return response()->json($songs, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $validData = $request->validate([
            'title' => 'required',
            'title_short' => 'required',
            'duration' => 'required',
            'preview' => 'required',
            'cover_small' => 'required',
        ]);

        $song = Song::create([
            'title' => $validData['title'],
            'title_short' => $validData['title_short'],
            'duration' => $validData['duration'],
            'preview' => $validData['preview'],
            'cover_small' => $validData['cover_small'],
            'estado' => 1
        ]);

        return response()->json(['message' => 'Canción registrada'], 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function show(Song $song)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function edit(Song $song)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Song $song)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $song = Song::find($id);

        if(is_null($song)){
            return response()->json(['message' => 'Canción no encontrada'], 404);
        }

        $song->estado = 0;
        $song->save();

        return response()->json(['message' => 'Canción eliminada'], 201);
    }
}
