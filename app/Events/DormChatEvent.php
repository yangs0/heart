<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class DormChatEvent implements ShouldBroadcast
{
    use  SerializesModels; //InteractsWithSockets,

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $name;
    public $avatar;
    public $msg;

    public function __construct($msg, $room)
    {
        $this->name = "sss";
        $this->avatar = "sdasd";
        $this->msg = $msg;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return [
            'chatRoom'
        ];
    }
}
