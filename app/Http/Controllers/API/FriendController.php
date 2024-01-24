<?php

namespace App\Http\Controllers\API;

use App\Events\StatusChangeFriend;
use App\Http\Controllers\Controller;
use App\Models\Friend;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;

class FriendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function select($id, $status = 0)
    {
        $notFriends = Friend::where('user2', $id)->where('status', $status)->get();
        $listUser = User::whereIn('id', $notFriends->pluck('user1'))->orderBy('created_at', 'desc')->get();
        $data = [];
        foreach ($listUser as $user){
            $user->image = asset("storage/".$user->image);
            $user->days = Carbon::now()->diffForHumans($user->created_at);
            $data[] = $user;
        }
        return response()->json($data, 200);
    }
    public function delete($user1 ,$user2)
    {
        $user = User::find($user1);
        $toUser = User::find($user2);
        $friend = Friend::where('user1',$user1)->where('user2',$user2)->first();
        Friend::destroy($friend->id);
        return response()->json("success");
    }

    public function confirm($user1 ,$user2){
        $user = User::find($user1);
        $toUser = User::find($user2);
        $friend = Friend::where('user1',$user1)->where('user2',$user2)->first();
        $friend->update(['status' => 1]);
        broadcast(new StatusChangeFriend($toUser,$user,1));
        return response()->json("success");
    }
}
