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
     * @var int
     */
    public $id = 1;
    /**
     * @var string
     */
    public $method = '';
    /**
     * @var array
     */
    public $params = [];

    /**
     * @return array
     */
    public function get()
    {
        return [
            'id'      => $this->id,
            'jsonrpc' => self::RPC_VERSION,
            'method'  => $this->method,
            'params'  => (object)$this->params,
        ];
    }

    /**
     * @param string $key
     * @return string
     */
    public function getSigned(string $key): string
    {
        $data = $this->get();

        return hash_hmac(
            'sha512',
            json_encode($data),
            $key
        );
    }
}
