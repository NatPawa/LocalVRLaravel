<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showById(Request $request,$idUser)
    {
        return User::all()->find($idUser);
    }


    public function index()
    {
        return User::with('partidas')->get();
    }
}
