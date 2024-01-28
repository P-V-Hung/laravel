<?php

namespace App\Http\Controllers;

use App\Models\Story;
use App\Models\User;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $listFriend = (new FriendController())->listFriend($id);
        $listUserId = $listFriend->map(function ($item) use ($id){
            return $id == $item->user1 ? $item->user2 : $item->user1;
        });
        $time = now()->subHour(24);
        $listMyStory = Story::where('user_id',$id)->where('created_at','>=',$time)->get();
        $data = [];
        foreach($listMyStory as $story){
            $user = User::find($story->user_id);
            $data[$user->id]['name'] = $user->name;
            $data[$user->id]['image'] = asset('storage/'.$user->image);
            $data[$user->id]['video'][] = asset('storage/'.$story->photo);
        }
        $listStory = Story::whereIn('user_id',$listUserId)->where('created_at','>=',$time)->get();
        foreach($listStory as $story){
            $user = User::find($story->user_id);
            $data[$user->id]['name'] = $user->name;
            $data[$user->id]['image'] = asset('storage/'.$user->image);
            $data[$user->id]['video'][] = asset('storage/'.$story->photo);
        }
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $file = $request->file('file');
        $fileName = "uploads/videos/".$file->getClientOriginalName();
        $file->move(public_path('storage/uploads/videos'),$fileName);
        Story::create([
            'user_id' => auth()->user()->id,
            'photo' => "uploads/videos/".$fileName
        ]);
        return redirect(route('home'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
