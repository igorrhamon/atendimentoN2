<?php

namespace App\Events;

use App\Atendimento;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class inicioAtendimento implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $title;
    public $atendimento;
    public $location;
    public $body;

    public function __construct(Atendimento $atendimento)
    {
        $this->title =
            'O Técnico '.    $atendimento->tecnico->user->name.
            ' iniciou o atendimento';
        $this->body = "Localização: ".$atendimento->location->name;
        $this->location = $atendimento->location;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('my-channel');
    }

    public function broadcastAs()
    {
        return 'formSender';
    }
}
