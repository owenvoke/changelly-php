<?php

namespace pxgamer\Changelly;

/**
 * Class Message
 */
class Message
{
    /**
     * The version of the RPC protocol.
     */
    const RPC_VERSION = '2.0';
    /**
     * @var string
     */
    public $id = '';
    /**
     * @var string
     */
    public $method = '';
    /**
     * @var array
     */
    public $params = [];

    /**
     * @param string $key
     * @return string
     */
    public function getSigned(string $key): string
    {
        $data = [
            'jsonrpc' => self::RPC_VERSION,
            'method'  => $this->method,
            'params'  => $this->params,
            'id'      => $this->id,
        ];

        return hash_hmac(
            'sha512',
            json_encode($data),
            $key
        );
    }
}
