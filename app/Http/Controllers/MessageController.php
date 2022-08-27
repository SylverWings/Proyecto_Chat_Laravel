<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MessageController extends Controller
{
    public function sendMessage(Request $request, $id)
    {
        try {
            Log::info('Creating Message');

            $message = $request->input('message');            
            $userId = auth()->user()->id;
            $channel = $id;

            $newMessage = new Message();
            $newMessage->message = $message;
            $newMessage->user_id = $userId;
            $newMessage->channel_id = $channel;
            $newMessage->save();

            return response()->json(
                [
                    "success"=> true,
                    "message"=> 'Message Created',
                    "data"=> $newMessage
                ],
                200
            );
            
        } catch (\Exception $exception) {
            Log::error('Error creating Message: ' .$exception->getMessage());
            return response()->json(
                [
                    "success"=> false,
                    "message"=> 'Error creating Message'
                ],
                500
            );
        }
    }


    public function getMessagesInChannelById ($id)
    {
        try {
            Log::info('Getting message id: '.$id);

            $channel_id = $id;
            $messages = Message::find($channel_id)->message;            
            $sorted = $messages->sortByDesc('created_at');
            $sorted->values()->all();

            return response()->json(
                [
                    "success"=> true,
                    "message"=> 'Get all Messages',
                    "data"=> $sorted
                ],
                200
            );

        } catch (\Exception $exception) {
            Log::error('Error Getting message id: ' .$exception->getMessage());
            return response()->json(
                [
                    "success"=> false,
                    "message"=> 'Error getting Message'
                ],
                500
            );
        }
    }


    public function updateMessage(Request $request, $id) {
        try {

            Log::info('Updating message id: '.$id);
            $userId = auth()->user()->id;
            $message = Message::where('user_id','=',$userId)->find($id);

            if(!$message){
                return response()->json(
                    [
                        'success' => false,
                        'message' => 'message not found'
                    ],
                    404
                );
            }

            $message->message = $request->input('message');
            $message->save();

            return response()->json(
                [
                    'success' => true,
                    'message' => 'message updated',
                    'data'=> $message
                ],
                200
            );
            
        }catch(\Exception $exception){
            Log::error('Error updating message: '.$exception->getMessage());            
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Error updating message'
                ],
                500
            );
        }
    }


    public function deleteMessageById($id)
    {
        try {
            Log::info('Delete Message id: '. $id);

            $userId = auth()->user()->id;
            $message = Message::query()->where('user_id', '=', $userId)->find($id);

            if(!$message){
                return response()->json(
                    [
                        'success' => false,
                        'message' => 'Message doesnt exist'
                        
                    ],
                    404
                );
            }

            $message->delete();

            return response()->json(
                [
                    "success" => true,
                    "message" => 'Message delete successfuly',
                    "data" => $message
                ],
                200
            );
        } catch (\Exception $exception) {
            Log::error('Error deleting message id: ' .$exception->getMessage());
            return response()->json(
                [
                    "success" => false,
                    "message" => 'Error Getting Your message'
                ],
                500
            );
        }
    }

}
