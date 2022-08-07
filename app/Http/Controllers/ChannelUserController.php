<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ChannelUserController extends Controller
{
    const CHANNEL = 1;

    public function joinChannel($id)
    {

        try {
            Log::info('User join to channel');

            $user = User::query()->find($id);
            $user->channel()->attach(self::CHANNEL);

            return response()->json(
                [
                    'success' => true,
                    'message' => 'User join to channel',
                    'data' => $user
                ],
                200
            );
        } catch (\Exception $exception) {
            Log::error('Error Adding user to channel: ' . $exception->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Unable to Add user to channel',
                'data' => $user
                ],
                500
            );
        }
    }


    public function leaveChannel($id)
    {
        try {
            Log::info('User leave channel');

            $user = User::query()->find($id);
            $user->channel()->detach(self::CHANNEL);

            return response()->json([
                'success' => true,
                'message' => 'User leave channel',
                'data' => $user
                ],
                200
            );
        } catch (\Exception $exception) {
            Log::error('Error Removing user from channel: ' . $exception->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Unable to Remove user from channel',
                'data' => $user
                ],
                500
            );
        }
    }
}
