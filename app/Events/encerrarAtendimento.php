<?php

namespace App\Events;

use App\Atendimento;
use Carbon\Carbon;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class encerrarAtendimento implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $title;
    public $body;
    public $idLocation;

    public function __construct(Atendimento $atendimento)
    {

        $this->title = "O Técnico ".$atendimento->tecnico->user->name." terminou o atendimento";
        $this->body = "Tempo de atendimento: ".$atendimento->tempoDeAtendimento;
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
