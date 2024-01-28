<?php

namespace App\Http\Controllers;

use App\Events\FriendActiveStatus;
use App\Models\Friend;
use App\Models\Post;
use App\Models\PostImg;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Queue;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($page)
    {
        $size = 15;
        $offset = ($page-1) * $size;
        $id = auth()->user()->id;
        $listFriend = Friend::where(function ($query) use ($id) {
            $query->where('user1',$id)->orWhere('user2',$id);
        })->where('status',1)->get();
        $listUser = [];
        foreach ($listFriend as $friend){
            $userId = $friend->user1 == $id ? $friend->user2 : $friend->user1;
            $listUser[] = $userId;
        }
        $listPost = Post::whereIn('user_id',$listUser)->orderBy('created_at','desc')->offset($offset)->limit($size)->get();
        return $this->getData($listPost);
    }

    public function getData($listPost){
        $listData = [];
        foreach ($listPost as $post){
            $user = User::find($post->user_id);
            $postImage = PostImg::where('post_id',$post->id)->get();
            $photos = $postImage->filter(function ($img) {
                $extension = pathinfo($img->photo, PATHINFO_EXTENSION);
                return in_array($extension, ['jpg', 'jpeg', 'png', 'gif']);
            })->map(function ($img) {
                return $img->photo;
            });
            $videos = $postImage->filter(function ($img) {
                $extension = pathinfo($img->photo, PATHINFO_EXTENSION);
                return in_array($extension, ['mp4', 'avi', 'mov']);
            })->map(function ($img) {
                return $img->photo;
            });
            $time = ($post->created_at)->diffInHours(Carbon::now());
            $echoTime = $time. " giờ trước";
            if ($time > 24) {
                $time = floor($time/24);
                $echoTime = $time. " ngày trước";
            }
            $data = [
                'idUser' => $post->user_id,
                'time' => $echoTime,
                'like' => $post->icon,
                'name' => $user->name,
                'image' => $user->image,
                'content' => $post->content,
                'photo' => $photos,
                'video' => $videos
            ];
            $listData[] = $data;
        }
        return view('posts.load-post',compact('listData'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $maxFileSize = 20 * 1024 * 1024;
        $post = Post::create([
            'user_id' => $request->id,
            'content' => $request->message
        ]);
        $photos = [];
        $videos = [];

        if($request->hasFile('photo')){
            $files = $request->file('photo');
            foreach ($files as $file) {
                $mime = $file->getMimeType();
                if ($file->getSize() > $maxFileSize) {
                    return response()->json('File is too large.', 422);
                }

                $fileName = '';
                if (str_contains($mime, 'image')) {
                    $fileName = "uploads/images/".$file->getClientOriginalName();
                    $file->move(public_path('storage/uploads/images'),$fileName);
                    $photos[] = asset("storage/".$fileName);
                } else if(strpos($mime, 'video') !== false) {
                    $fileName = "uploads/videos/".$file->getClientOriginalName();
                    $file->move(public_path('storage/uploads/videos'),$fileName);
                    $videos[] = asset("storage/".$fileName);
                }
                PostImg::create([
                    'post_id' => $post->id,
                    'photo' => $fileName,
                ]);
            }
        }
        $time = ($post->created_at)->diffInHours(Carbon::now());
        $data = [
            'idUser' => $post->user_id,
            'time' => $time. " phút trước",
            'like' => 0,
            'name' => auth()->user()->name,
            'image' => asset("storage/".auth()->user()->image),
            'content' => $post->content,
            'photo' => $photos,
            'video' => $videos
        ];

        $listFriend = (new FriendController())->listFriend(auth()->user()->id);
        foreach ($listFriend as $friend){
            broadcast(new FriendActiveStatus(auth()->user(),$friend->user1 === auth()->user()->id ? $friend->user2 : $friend->user1,auth()->user()->name." đã cập nhật một trạng thái mới!"));
        }
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $listPost = Post::where('user_id',$id)->orderBy('created_at','desc')->get();
        return $this->getData($listPost);
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
