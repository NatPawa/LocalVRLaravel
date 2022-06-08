<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Partida;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Device::with('games')->get();
    }

    public function whitGames()
    {
        return Device::with('games')->get();
    }

    public function inLobby($idDevice)
    {
        return Partida::all()->where("device_id", $idDevice)->sortByDesc('id')->values()->first()->state == "inLobby";
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


    public function searchGamesDevices(Request $request, $deviceId)
    {
        $searchInput = $request->input('search');
        $games = null;
        if(!is_null($searchInput)){
            $searchQuery = "%$searchInput%";
            $games = Device::all()->find($deviceId)->games()->where('name','like',$searchQuery)->get();
        }
        
        return $games;
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $device = new Device();
        $device->QRName = "Equip1";
        $device->type = "Raspberry";
        $device->state = "waiting";
        $device->ip = "192.168.1.147";
        return $device->save();
    }

    public function attachGameToDevice(Request $request,$id,$gameId)
    {
        return Device::all()->find($id)->games()->attach($gameId);
    }

    public function detachGameToDevice(Request $request,$id,$gameId)
    {
        return Device::all()->find($id)->games()->detach($gameId);
    }

    public function show($deviceName)
    {
        return Device::with('games')->where("QRName", $deviceName)->get()->first();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     
    */
    //public function show(Device $device)
    /*{
        
    }*/

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function edit(Device $device)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Device $device)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function destroy(Device $device)
    {
        //
    }
}
