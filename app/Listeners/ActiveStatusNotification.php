<?php

namespace App\Listeners;

use App\Events\FriendActiveStatus;
use App\Models\Friend;
use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ActiveStatusNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Login $event): void
    {
        $user = $event->user;
        $friends = Friend::where(function($query) use ($user) {
            $query->where('user1',$user->id)->orWhere('user2',$user->id);
        })->where('status',1)->get();
        foreach ($friends as $friend){
            broadcast(new FriendActiveStatus($user,$friend->user1 === $user->id ? $friend->user2 : $friend->user1,$user->name . " đã online!"));
        }
    }
}
