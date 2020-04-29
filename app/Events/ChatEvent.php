<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\User;

class ChatEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    public $user;
    public $photourl;
    public $role;
    public $id;
    // public $id;
    
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($message, User $user)
    {
         $this->message=$message;
         $this->user=$user->nickname;
         $this->photourl=$user->photo_url;
         $this->role=$user->role;
         $this->id=$user->id;  
         // $this->id=$id;
         $this->dontBroadcastToCurrentUser();
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        
         return new PrivateChannel('chat');
        // return new PrivateChannel('chat.'.$this->id);
    }
}
