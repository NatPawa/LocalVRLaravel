<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\File;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return Inertia::render('Home', ['test' => 'working']);
});

Route::post('/game', [GameController::class, 'storelogo']);

Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/about-us', function () {
    return Inertia::render('About', ['about_us' =>"a"]);
});

Route::get('/game/edit', function () {
    return Inertia::render('UpdateGame', ['about_us' =>"a"]);
});

Route::get('/play', function () {
    return Inertia::render('Play', ['about_us' =>"a"]);
});

Route::get('/me', function () {
    return Auth::socialiteUser();
});

Route::get('/token', function () {
    return csrf_token();
});


Auth::routes();

Route::get('/auth/github/redirect', function () {
    return Socialite::driver('github')->redirect();
});


Route::get('/auth/github/callback', function () {
    $socialiteUser = Socialite::driver('github')->user();

    $user = \App\Models\User::where([
        'provider' => 'github',
        'provider_id' => $socialiteUser->getId()
    ])->first();

    if(!$user){

        $fileContents = file_get_contents($socialiteUser->getAvatar());
        File::put(public_path() . '/users/profileimages/' . $socialiteUser->getId() . ".jpg", $fileContents);

        //To show picture 
        $picture = '/users/profileimages/' . $socialiteUser->getId() . ".jpg";
        $user = \App\Models\User::create([
            'name' => $socialiteUser->getNickname(),
            'email' => $socialiteUser->getEmail(),
            'points' => 0,
            'urlimage' => $picture,
            'provider' => 'github',
            'provider_id' => $socialiteUser->getId(),
            'email_verified_at' => now()
        ]);
    }

    \Illuminate\Support\Facades\Auth::login($user);
    //dd($socialiteUser->getName(),$socialiteUser->getEmail(),$socialiteUser->getId(),$socialiteUser->getNickname(),$socialiteUser->getAvatar());
    // $socialiteUser->token
    return redirect('/');
});
