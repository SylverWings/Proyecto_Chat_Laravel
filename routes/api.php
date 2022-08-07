<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
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

Route::get('/', function () {
    return "Bienvenidos";
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::group(
    ['middleware'=> 'jwt.auth'],
    function(){
        Route::get('/profile', [AuthController::class, 'profile']);
        Route::put('/profile/update/{id}',[AuthController::class,'updateUser']);
        Route::post('/logout', [AuthController::class, 'logout']);
    }
);

//Games
Route::group(
    ['middleware'=> 'jwt.auth'],
    function() {
        Route::post('/games', [GameController::class, 'createGame']);
        Route::get('/games', [GameController::class, 'getAllGames']);
        Route::get('/games/{id}', [GameController::class, 'getGameById']);
        Route::put('/games/{id}', [GameController::class, 'updateGame']);
        Route::delete('/games/{id}', [GameController::class, 'deleteGame']);
    }
);

//Channels
Route::group(
    ['middleware'=> 'jwt.auth'],
    function(){
        Route::post('/channel', [ChannelController::class, 'createChannel']);
        Route::get('/channel', [ChannelController::class, 'getAllChannels']);
        Route::get('/channel/{id}', [ChannelController::class, 'getChannelById']);
        Route::put('/channel/{id}', [ChannelController::class, 'updateChannelById']);
        Route::delete('/channel/{id}',[ChannelController::class, 'deleteChannelById']);
    }
);

//Join Channels
Route::group(
    ['middleware'=> 'jwt.auth'],
    function(){
        Route::post('/joinChannel', [ChannelUserController::class, 'joinChannel']);
        Route::delete('/leaveChannel/{id}',[ChannelUserController::class, 'leaveChannel']);
    }
);

//Messages
Route::group(
    ['middleware'=> 'jwt.auth'],
    function(){
        Route::post('/Message', [MessageController::class, 'sendMessage']);
        Route::get('/message/{id}', [MessageController::class, 'getAllMessagesInChannelById']);
        Route::put('/message/{id}', [MessageController::class, 'updateMessage']);
        Route::delete('/deleteMessage/{id}',[MessageController::class, 'deleteMessage']);
    }
);