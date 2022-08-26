<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ChannelController extends Controller
{
    public function createChannel (Request $request, $id)
    {
        try {
            Log::info('Creating Channel');

            $name = $request->input('name');            
            $userId = auth()->user()->id;
            $game = $id;

            // if(!$name|| $name == ""){
            //     return response()->json(
            //         [
            //             "success"=> false,
            //             "message"=> 'Missing Channel Name' 
            //         ],
            //         400
            //     );
            // }

            $newChannel = new Channel();
            $newChannel->name = $name;
            $newChannel->user_id = $userId;
            $newChannel->game_id = $game;
            $newChannel->save();

            return response()->json(
                [
                    "success"=> true,
                    "message"=> 'Channel created successfuly',
                    "data" => $newChannel
                ],
                200
            );

        } catch (\Exception $exception) {
            Log::error('Error creating Channel: ' .$exception->getMessage());

            return response()->json(
                [
                    "success"=> false,
                    "message"=> 'Error creating Channel'
                ],
                500
            );
        }
    }


    public function getAllChannels ()
    {
        try {
            Log::info('Getting Channels');
            
            $channel = Channel::query()
                ->get()
                ->toArray();

            return response()->json(
                [
                    "success"=> true,
                    "message"=> 'Getting all channels',
                    "data"=> $channel
                ],
                200
            );


        } catch (\Exception $exception) {
            Log::error('Error Getting All Channels: ' .$exception->getMessage());           
            return response()->json(
                [
                    "success"=> false,
                    "message"=> 'Error Getting Channels'
                ],
                500
            );
        }
    }


    public function getChannelById ($id)
    {
        try {

            Log::info('Getting channel id: ' . $id);

            $userId = auth()->user()->id;
            $channel = Channel::query()->where('user_id' , '=', $userId)->find($id);
            
            if(!$channel){
                return response()->json(
                    [
                        "success"=> false,
                        "message"=> 'Channel not found'                        
                    ],
                    404
                );
            }
            
            return response()->json(
                [
                    "success"=> true,
                    "message"=> 'Get Channel by id: '. $id,
                    "data" => $channel
                    
                ],
                200
            );
        } catch (\Exception $exception) {
            Log::error('Error Getting All Channel: ' .$exception->getMessage());
            return response()->json(
                [
                    "success"=> false,
                    "message"=> 'Error Getting Your Channel'
                ],
                500
            );
        }
    }


    public function updateChannel(Request $request, $id) {

        try {

            Log::info('Updating channel with id: '.$id);
            
            $userId = auth()->user()->id;
            $channel = Channel::where('user_id','=',$userId)->find($id);

            if(!$channel){
                return response()->json(
                    [
                        'success' => false,
                        'message' => 'channel not found'                        
                    ],
                    404
                );
            }

            $channel->name = $request->input('name');
            $channel->save();

            return response()->json(
                [
                    'success' => true,
                    'message' => 'channel updated',
                    'data'=> $channel
                ],
                200
            );

        }catch(\Exception $exception){

            Log::error('Error updating channel: '.$exception->getMessage());
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Error updating channel'
                ],
                500
            );
        }
    }

    
    public function deleteChannel($id)
    {

        try {
            Log::info('Delete channel id: '. $id);

            $userId = auth()->user()->id;
            $channel = Channel::query()->where('user_id', '=', $userId)->find($id);
            $channel->delete();

            return response()->json(
                [
                    "success" => true,
                    "message" => 'Channel deleted successfuly',
                    "data" => $channel
                ],
                200
            );

        } catch (\Exception $exception) {

            Log::error('Error deleting channel by id: ' .$exception->getMessage());
            return response()->json(
                [
                    "success" => false,
                    "message" => 'Error deleting channel'
                ],
                500
            );
        }
    }

}
