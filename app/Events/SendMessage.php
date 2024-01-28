<?php

namespace App\Events;

use Carbon\Carbon;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class SendMessage implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;
    public $toUser;
    public $message;
    public $date;
    /**
     * Create a new event instance.
     */
    public function __construct($user,$toUser,$message,$date)
    {
        $this->user = $user;
        $this->toUser = $toUser;
        $this->message = $message;
        $this->date = $date;
        $this->broadcastOn();
    }

    public function broadcastOn()
    {
        return new PrivateChannel('friend.send.message.'.$this->toUser->id);
    }

    public function broadcastWith()
    {
        return [
            'user' => $this->user,
            'message' => $this->message,
            'date' => $this->date
        ];
    }
}
