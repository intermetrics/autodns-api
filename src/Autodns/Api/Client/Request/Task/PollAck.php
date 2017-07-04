<?php

namespace Autodns\Api\Client\Request\Task;

use Autodns\Api\Client\Request\Task;

class PollAck implements Task
{
    private $messageId;

    public function messageId($messageId)
    {
        $this->messageId = $messageId;
    }

    /**
     * @return array
     */
    public function asArray()
    {
        $array = [
            'code'      => '0906',
            'message'   => [
                'id'    => $this->messageId,
            ],
        ];
        return $array;
    }
}
