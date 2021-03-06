<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\SliderItemController;

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


/* SLIDER */

Route::get('/slider', [SliderItemController::class, 'index']);
Route::post('/slider/{sliderItemId}/image', [SliderItemController::class, 'uploadImage']);
Route::post('/slider/edit/{sliderItemId}', [SliderItemController::class, 'updateSlider']);

Route::get('/', function () {
    return Inertia::render('Home');
});

Route::get('/admin', function () {
    return Inertia::render('Admin', ['about_us' =>"a"]);
})->middleware('adminoreditor');

Route::get('/admin/events', function () {
    return Inertia::render('Events/Events', ['about_us' =>"a"]);
})->middleware('adminoreditor');

Route::get('/admin/slider', function () {
    return Inertia::render('Slider/AdminSlider');
})->middleware('adminoreditor');

Route::get('/game/edit', function () {
    return Inertia::render('UpdateGame', ['about_us' =>"a"]);
});

Route::get('/play', function () {
    return Inertia::render('Play', ['about_us' =>"a"]);
})->middleware('auth');;

Route::get('/me', function () {
    return Auth::user();
});

Route::get('/token', function () {
    return csrf_token();
});

Auth::routes();

Route::get('/auth/google/callback', function () {
    
    try {
        $user = Socialite::driver('google')->user();
    } catch (\Exception $e) {
        return redirect('/login');
    }        // only allow people with @company.com to login
 
    $existingUser = \App\Models\User::where('google_id', $user->id)->first();  

    if($existingUser){
        // log them in
        auth()->login($existingUser, true);
    } else {             
          //Create user
          $newUser = \App\Models\User::create([
            'name' => $user->name,
            'email' => $user->email,
            'points' => 0,
            'urlimage' => $user->avatar,
            'google_id' => $user->id,
            'email_verified_at' => now()
        ]);
        auth()->login($newUser, true);
    }

    return redirect()->to('/');
});

Route::get('/auth/google/redirect', function () {
    return Socialite::driver('google')->with(["prompt" => "select_account"])->redirect();
});

Route::get('/auth/github/redirect', function () {
    return Socialite::driver('github')->redirect();
});

Route::get('/auth/lol/redirect', function () {
    return Socialite::driver('riot_oauth')->redirect();
});

Route::get('/auth/github/callback', function () {

    $socialiteUser = Socialite::driver('github')->user();

    //Check if exist
    $user = \App\Models\User::where([
        'github_id' => $socialiteUser->getId()
    ])->first();

    if(!$user){

        //Save image in public path
        $fileContents = file_get_contents($socialiteUser->getAvatar());
        File::put(public_path() . '/users/profileimages/' . $socialiteUser->getId() . ".jpg", $fileContents);

        //To show picture 
        $picture = '/users/profileimages/' . $socialiteUser->getId() . ".jpg";

        //Create user
        $user = \App\Models\User::create([
            'name' => $socialiteUser->getNickname(),
            'email' => $socialiteUser->getEmail(),
            'points' => 0,
            'urlimage' => $picture,
            'github_id' => $socialiteUser->getId(),
            'email_verified_at' => now()
        ]);
    }

    //Login and redirect to home
    \Illuminate\Support\Facades\Auth::login($user);
    return redirect('/');
});

