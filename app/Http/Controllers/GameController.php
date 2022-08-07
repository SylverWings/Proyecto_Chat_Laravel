<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class GameController extends Controller
{
    public function createGame(Request $request)
    {
        try {

            Log::info("Create a game");

            $validator = Validator::make($request->all(), [
                'title' => 'required|string|max:191'                
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => "Error validating game",
                    'data' => $validator->errors()
                ], 400);
            }

            $newGame = new Game();

            $newGame->title = $request->input("title");            
            $newGame->save();

            return response()->json([
                'success' => true,
                'message' => "Game creation successfuly",
                'data' => $newGame
            ]);

        } catch (\Exception $exception) {
            Log::error("Error creating game: " . $exception->getMessage());
            return response()->json([
                'success' => false,
                'message' => "Error creating game"
            ], 500);
        }
    }


    public function getAllGames()
    {
        try {

            Log::info("Getting all games");

            $games = Game::query()
                ->get()
                ->toArray();

            return response()->json([
                'success' => true,
                'message' => "Get all games retrieved.",
                'data' => $games
            ]);
        } catch (\Exception $exception) {
            Log::error("Error getting games: " . $exception->getMessage());
            return response()->json([
                'success' => false,
                'message' => "Error getting games"
            ], 500);
        }
    }


    public function getGameById($id)
    {
        try {

            Log::info("Getting game id: " . $id);
            
            $game = Game::query()->find($id);

            return response()->json([
                'success' => true,
                'message' => "Get game by id.",
                'data' => $game
            ]);

        } catch (\Exception $exception) {

            Log::error("Error getting games: " . $exception->getMessage());
            return response()->json([
                'success' => false,
                'message' => "Error getting game"
            ], 500);
        }
    }


    public function updateGame(Request $request, $id)
    {
        try {
            Log::info("Update game id: " . $id);

            $validator = Validator::make($request->all(), [
                'title' => 'required|string|max:191'                
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => "Error validating game",
                    'data' => $validator->errors()
                ], 400);
            }

            $game = Game::query()->find($id);            
            $title = $request->input("title");
            
            if(isset($title)){
                $game->title = $request->input("title");
            }
            
            $game->save();

            return response()->json([
                'success' => true,
                'message' => "Game updated",
                'data' => $game
            ]);

        } catch (\Exception $exception) {
            Log::error("Error updating game: " . $exception->getMessage());
            return response()->json([
                'success' => false,
                'message' => "Error updating game"
            ], 500);
        }
    }

    public function deleteGame($id)
    {
        try {
            Log::info("Deleting game id: " . $id);

            $game = Game::query()->find($id);            
            $game->delete();

            return response()->json([
                'success' => true,
                'message' => "Game deleted",
                'data' => $game
            ]);
            
        } catch (\Exception $exception) {
            Log::error("Error deleting game: " . $exception->getMessage());
            return response()->json([
                'success' => false,
                'message' => "Error deleting game"
            ], 500);
        }
    }
}
