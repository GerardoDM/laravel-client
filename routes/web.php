<?php

use Illuminate\Support\Facades\Route;


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
    return view('welcome');
});


Route::view('login', 'login')->name('login')->middleware('guest');
Route::view('register', 'register')->name('register')->middleware('guest');
Route::view('dashboard', 'dashboard')->middleware('jwt');

Route::post('loginApi', 'Controllers\AuthController@loginApi')->name('loginApi');
Route::post('register', 'Controllers\AuthController@registerapi')->name('register');

Route::post('login', function(Request $request) {
    $credentials = request()->only('email', 'password');

	$user = User::where([
    	'email' => $request->email, 
    	'password' => $request->password
	])->first();

	if($user)
	{
    	Auth::login($user);
	request()->session()->regenerate();
    	return redirect('dashboard');
	}

	return redirect('login');



});

