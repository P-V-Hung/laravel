<?php

namespace App\Http\Controllers\API;

use App\Events\SendMessage;
use App\Http\Controllers\Controller;
use App\Models\Friend;
use App\Models\Message;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PhpParser\Builder\Class_;

class MessageController extends Controller
{
    public function select($user,$withUser,$page){
        $size = 20;
        $offset = ($page - 1) * $size;

        $listMessage = Message::where(function ($query) use ($user,$withUser){
            $query->where('user2',$user)->where('user1',$withUser);
        })->orWhere(function ($query) use ($user,$withUser){
            $query->where('user1',$user)->where('user2',$withUser);
        })->orderBy('created_at','desc')->offset($offset)->limit($size)->get();

        $listMessage = $listMessage->reverse();

        $data = [];
        foreach($listMessage as $message){
            $user = User::find($message->user2);
            $content = [
                'id' => $message->id,
                'idUser' =>  $user->id,
                'nameUser' => $user->name,
                'imageUser' => asset("storage/".$user->image),
                'message' => $message->message,
                'date' => Carbon::parse($message->created_at)->format('h:i A'),
                'image' => $message->image
            ];
            $data[] = $content;
        }
        return response()->json($data);
    }

    public function send($user, $toUser, $message){
        $messages = Message::create([
            'user1' => $toUser,
            'user2' => $user,
            'message' => $message,
            'image' => NULL,
        ]);
        $user1 = User::find($user);
        $user2 = User::find($toUser);
        broadcast(new SendMessage($user1,$user2,$message,Carbon::parse($messages->created_at)->format('h:i A')));
        return response()->json([
            'imageUser' => asset("storage/".$user1->image),
            'userName' => $user1->name,
            'date' => Carbon::parse($messages->created_at)->format('h:i A'),
            'message' => $message
        ]);
    }
}
