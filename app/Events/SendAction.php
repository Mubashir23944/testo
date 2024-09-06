<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SendAction
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var array $ids
     */
    public $ids;

    /**
     * @var array $ids
     */
    public $user_types;

    /**
     * @var array $payload
     */
    public $payload;

    /**
     * @var mixed|null $type
     */
    public $type;

    /**
     * @var false|mixed $activity
     */
    public $activity;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(array $ids, array $user_types, array $payload, $type = null, $activity = false)
    {
        $this->ids = $ids;
        $this->user_types = $user_types;
        $this->payload = $payload;
        $this->type = $type;
        $this->activity = $activity;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
