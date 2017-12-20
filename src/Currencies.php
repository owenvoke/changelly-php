<?php

namespace pxgamer\Changelly;

class Currencies
{
    use Traits\ApiCallable;

    public function get()
    {
        $message = new Message();
        $message->method = 'getCurrencies';

        return $this->call($message);
    }

    public function getFull()
    {
        $message = new Message();
        $message->method = 'getCurrenciesFull';

        return $this->call($message);
    }
}
