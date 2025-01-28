<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;    
use Laravel\Socialite\Facades\Socialite;    
use App\Http\Controllers\SocialController;          
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SocialiteController;

use App\Http\Controllers\AuthController;    
Route::get('/', function () {
    return view('welcome');
});
Route::get('/auth/redirect', function () {
    return Socialite::driver('linkedin')->redirect();
});
 
Route::get('/auth/callback', function () {
    $user = Socialite::driver('linkedin')->user();
 
    // $user->token
});
// 42f6439716541f7d188effe45155a81740acbca2
// Ov23li5ofQl6r7hNJQee


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'submitLogin'])->name('login.submit');
Route::get('/dashboard', function () {
    return 'Welcome to the dashboard!';
})->name('dashboard');
// linkedin 77u4r1bt98lwnl
// linkedin WPL_AP1.YEl8tc2SQjXfQtM0.pd7yYA==
// http://127.0.0.1:8000/linkedin/callback



// Route::get('/', function () {

//     return view('welcome');
    
//     });
    
// Auth:: routes();
    
// Route::get('/home', 'HomeController@index')->name('home');
    
// Route::get('linkedin/login', 'SocialController@provider')->name('linked.login');
    
// Route::get('linkedin/callback', 'SocialController@provider')->name('linked.user');
// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


use App\Http\Controllers\LinkedInController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'submitLogin'])->name('login.submit');

// // LinkedIn Authentication Routes
// Route::get('/auth/linkedin', [LinkedInController::class, 'redirectToLinkedIn'])->name('linkedin.redirect');
// Route::get('/auth/linkedin/callback', [LinkedInController::class, 'handleLinkedInCallback'])->name('linkedin.callback');
// Route::get('/home', function () {
//     return 'Welcome to the dashboard!';
// })->middleware('auth');


// LinkedIn Authentication Routes
Route::get('/auth/linkedin', [LinkedInController::class, 'redirectToLinkedIn'])->name('linkedin.redirect');
Route::get('/auth/linkedin/callback', [LinkedInController::class, 'handleLinkedInCallback'])->name('linkedin.callback');

// Dashboard Route
Route::get('/home', function () {
    return 'Welcome to the dashboard!';
})->middleware('auth');
Route::get('auth/google', [SocialiteController::class, 'googleLogin'])->name('auth.google');