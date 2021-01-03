<?php

namespace App\Services;

use danog\MadelineProto\API;

class MTProto
{
    /**
     * MTProto client
     * @var API
     */
    protected $client;

    public function __construct()
    {
        $this->client = new API('session.madeline', config('mtproto'));
        $this->client->async(false);
    }

    public function getChannelUsers($channel_id)
    {
        return $this->client->getPwrChat($channel_id);
    }

    public function getChannelStats($channel_id)
    {
        return $this->client->stats->getBroadcastStats([
            'channel' => $channel_id
        ]);
    }

    public function getChannelHistory(string $channel_id, int $offset_id = 0, int $offset_date = 0, int $add_offset = 0, int $limit = 2147483647, int $max_id = 0, int $min_id = 0)
    {
        return $this->client->messages->getHistory([
            'peer' => $channel_id,
            'offset_id' => $offset_id,
            'offset_date' => $offset_date,
            'add_offset' => $add_offset,
            'limit' => $limit,
            'max_id' => $max_id,
            'min_id' => $min_id
        ]);
    }
}
