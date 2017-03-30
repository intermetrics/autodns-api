<?php

namespace Autodns\Api\Client\Request\Task;

use Autodns\Api\Client\Request\Task;

class TransferOut implements Task
{
    private $domain;
    private $type;
    private $nackReason;

    /**
     * @param $domain
     * @return $this
     */
    public function domain($domain)
    {
        $this->domain = $domain;
        return $this;
    }

    /**
     * @param $type
     * @return $this
     */
    public function type($type)
    {
        if (!in_array($type, ['nack', 'ack']))
            throw new \InvalidArgumentException(sprintf('"%s" is not a supported type for this task.', $type));

        $this->type = $type;
        return $this;
    }

    /**
     * @param $nackReason
     * @return $this
     */
    public function nackReason($nackReason)
    {
        $nackReason = (int) $nackReason;
        if (!in_array($nackReason, range(0, 6)))
            throw new \InvalidArgumentException(sprintf('"%s" is not a supported nack reason for this task.', $nackReason));

        $this->nackReason = $nackReason;
        return $this;
    }

        /**
     * @return array
     */
    public function asArray()
    {
        $array = [
            'code' => '0106002',
            'transfer'  => [
                'domain' => $this->domain,
                'type'  => $this->type,
            ],
        ];

        if ($this->nackReason !== null)
            $array['transfer']['nack_reason'] = $this->nackReason;

        return $array;
    }
}
