<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Resources\UserCollection;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showById(Request $request,$idUser)
    {
        return new UserCollection(User::all()->find($idUser));
    }


    public function index()
    {
        return User::with('partidas')->get();
    }

}
