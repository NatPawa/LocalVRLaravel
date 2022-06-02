<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Game;
use App\Models\Partida;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PartidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Partida::with('users')->get();
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

    public function store(Request $request,$gameId,$deviceId)
    {
        $partida = new Partida();
        $partida->code = Str::random(10);
        $partida->state = $request->state;
        $partida->info = $request->info;
        $partida->game_id = $gameId;
        $partida->device_id = $deviceId;
        return $partida->save();
    }

    public function attachUserToMatch($partidaId,$userId)
    {
        echo $userId;
        return Partida::all()->find($partidaId)->users()->attach($userId);
    }

    public function detachUserToMatch($partidaId,$userId)
    {
        return Partida::all()->find($partidaId)->users()->detach($userId);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Partida  $partida
     * @return \Illuminate\Http\Response
     */
    public function show(Partida $partida)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Partida  $partida
     * @return \Illuminate\Http\Response
     */
    public function edit(Partida $partida)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Partida  $partida
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partida $partida)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Partida  $partida
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partida $partida)
    {
        //
    }
}
