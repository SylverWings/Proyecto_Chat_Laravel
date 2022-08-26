<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ChannelUserController extends Controller
{
    
    public function joinChannel($channel_id)
    {
        try {
            Log::info('User join to channel');

            $userId = auth()->user()->id;
            $user = User::find($userId);
            $user->channels()->attach($channel_id);

            return response()->json(
                [
                    'success' => true,
                    'message' => 'User join to channel',
                    'data' => $userId
                ],
                200
            );
        } catch (\Exception $exception) {
            Log::error('Error Adding user to channel: ' . $exception->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Unable to Add user to channel',
                'data' => $userId
                ],
                500
            );
        }
    }


    public function leaveChannel($channel_id)
    {
        try {
            Log::info('User leave channel');

            $userId = auth()->user()->id;
            $user = User::find($userId);
            $user->channels()->detach($channel_id);

            return response()->json([
                'success' => true,
                'message' => 'User leave channel',
                'data' => $userId
                ],
                200
            );
        } catch (\Exception $exception) {
            Log::error('Error Removing user from channel: ' . $exception->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Unable to Remove user from channel',
                'data' => $userId
                ],
                500
            );
        }
    }
}
