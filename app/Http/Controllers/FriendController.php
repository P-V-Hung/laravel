<?php

namespace App\Http\Controllers;

use App\Events\AddFriend;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FriendController extends Controller
{
    public function search(Request $request){
        $keyword = $request->keywords;
        return view('friends.search',[
            'keyword' => $keyword
        ]);
    }

    public function loadData(Request $request){
        $keyword = $request->keyword;
        $listUser = User::where(function ($query) use ($keyword){
            $query->where('name','like',"%".$keyword."%")->orWhere('email','like',"%".$keyword."%");
        })->whereNotIn('id',[Auth::user()->id])->offset(($request->offset - 1) * $request->limit)->limit($request->limit)->get();
        $listData = [];
        foreach($listUser as $user){
            if(!$user->image === NULL){
                $user->image = asset($user->image);
            }else{
                $user->image = asset('images/user-1.png');
            }
            $listData[] = $user;
        }
        return response()->json(["data" => $listData]);
    }

    public function add(Request $request){
        $user = auth()->user();
        broadcast(new AddFriend($user," đã gửi kb cho thằng ".$request->id));
        return "Thành công";
    }
}
