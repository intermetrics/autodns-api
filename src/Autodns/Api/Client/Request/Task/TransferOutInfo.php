<?php

namespace Autodns\Api\Client\Request\Task;

use Autodns\Api\Client\Request\Task;

class TransferOutInfo implements Task
{
    private $domain;

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
     * @return array
     */
    public function asArray()
    {
        return [
            'code' => '0106001',
            'transfer'  => [
                'domain' => [
                    'name' => $this->domain,
                ],
            ],
        ];
    }
}
