<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class StatusChangeFriend implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $fromUser;
    public $toUser;
    public $status;
    /**
     * Create a new event instance.
     */
    public function __construct($fromUser,$toUser,$status)
    {
        $this->fromUser = $fromUser;
        $this->toUser = $toUser;
        $this->status = $status;
        $this->broadcastOn();
    }

    public function broadcastOn()
    {
        return new PrivateChannel('friend.change.'.$this->toUser->id);
    }

    public function broadcastWith(){
        return [
            'fromName' => $this->fromUser->name,
            'status' => $this->status
        ];
    }
}
