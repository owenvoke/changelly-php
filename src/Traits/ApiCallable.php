<?php

namespace pxgamer\Changelly\Traits;

use GuzzleHttp\Client;
use pxgamer\Changelly\Changelly;

trait ApiCallable
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => Changelly::API_BASE_URI,
        ]);
    }

    public function call(array $message)
    {

    }
}
