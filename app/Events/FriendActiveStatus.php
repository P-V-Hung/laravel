<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class FriendActiveStatus implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $fromUser;
    public $toId;
    public $message;
    /**
     * Create a new event instance.
     */
    public function __construct($fromUser,$toId,$message)
    {
        $this->fromUser = $fromUser;
        $this->toId = $toId;
        $this->message = $message;
        $this->broadcastOn();
    }

    public function broadcastOn()
    {
        return new PrivateChannel('friend.active.status.'.$this->toId);
    }

    public function broadcastWith(){
        return [
            'id' => $this->fromUser->id,
            'message' => $this->message
        ];
    }
}
