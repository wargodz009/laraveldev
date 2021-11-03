<?php

use App\Jobs\sendSignupMail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/generate-link', function (\Illuminate\Http\Request $request) {

    $request->validate(['email'=>'required|email']);

    sendSignupMail::dispatch(URL::signedRoute('signup'),$request->get('email'));

    return response()->json(['success'=>true]);
});

Route::apiResource('profile',\App\Http\Controllers\ProfileController::class);