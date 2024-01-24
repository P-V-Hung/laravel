<?php

namespace App\Http\Controllers;

use App\Events\StatusChangeFriend;
use App\Events\SelectFriend;
use App\Http\Controllers\Controller;
use App\Models\Friend;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FriendController extends Controller
{
    public function search(Request $request)
    {
        $keyword = $request->keywords;
        return view('friends.search', [
            'keyword' => $keyword
        ]);
    }

    public function loadData(Request $request)
    {
        $keyword = $request->keyword;
        $listUser = User::where(function ($query) use ($keyword) {
            $query->where('name', 'like', "%" . $keyword . "%")->orWhere('email', 'like', "%" . $keyword . "%");
        })->whereNotIn('id', [Auth::user()->id])->offset(($request->offset - 1) * $request->limit)->limit($request->limit)->get();

        $listFriendUser = Friend::where('user2', auth()->user()->id)->orWhere('user1', auth()->user()->id)->get();
        $listData = $listUser->map(function ($user) use ($listFriendUser) {
            $status = null;
            foreach ($listFriendUser as $friend) {
                if ($friend->user2 == auth()->user()->id && $friend->user1 == $user->id) {
                    if ($friend->status == 0) {
                        $status = 0;
                    } else if($friend->status == 1){
                        $status = 1;
                    }
                } else if ($friend->user1 == auth()->user()->id && $friend->user2 == $user->id) {
                    if ($friend->status == 0) {
                        $status = 2;
                    } else if($friend->status == 1){
                        $status = 1;
                    }
                }
            }
            $user->status = $status ?? 3;
            $user->image = asset("storage/{$user->image}");
            return $user;
        });
        return response()->json(["data" => $listData]);
    }

    public function add($id)
    {
        $user = auth()->user();
        $toUser = User::find($id);
        $friend = Friend::where('user1', $user->id)->where('user2', $id)->first();
        if (empty($friend)) {
            Friend::create([
                'user1' => $user->id,
                'user2' => $id
            ]);
        }
        broadcast(new StatusChangeFriend($user, $toUser, 0));
        return response()->json("success");
    }

}
