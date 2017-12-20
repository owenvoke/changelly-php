<?php

namespace pxgamer\Changelly\Traits;

use GuzzleHttp\Client;
use pxgamer\Changelly\Changelly;
use pxgamer\Changelly\Message;

/**
 * Trait ApiCallable
 */
trait ApiCallable
{
    /**
     * @var Client
     */
    protected $client;
    /**
     * @var string
     */
    protected $secret;
    /**
     * @var string
     */
    protected $apiKey;

    /**
     * ApiCallable constructor.
     */
    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => Changelly::API_BASE_URI,
        ]);
    }

    /**
     * @param Message $message
     *
     * @return mixed
     */
    public function call(Message $message)
    {
        return \GuzzleHttp\json_decode(
            $this->client
                ->post(
                    Changelly::API_BASE_URI,
                    [
                        'headers' => [
                            'Content-Type' => 'application/json',
                            'api-key'      => $this->apiKey,
                            'sign'         => $message->getSigned($this->secret),
                        ],
                        'json'    => $message->get(),
                    ]
                )
                ->getBody()
                ->getContents()
        );
    }

    /**
     * @param string $secret
     */
    public function setSecret(string $secret): void
    {
        $this->secret = $secret;
    }

    /**
     * @param string $apiKey
     */
    public function setApiKey(string $apiKey): void
    {
        $this->apiKey = $apiKey;
    }
}
