<?php

declare(strict_types=1);

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

    public function minimumAmount(string $from, string $to)
    {
        $message = new Message();
        $message->method = 'getMinAmount';
        $message->params = [
            'from' => $from,
            'to'   => $to,
        ];

        return $this->call($message);
    }

    public function exchangeAmount(string $from, string $to, float $amount)
    {
        $message = new Message();
        $message->method = 'getExchangeAmount';
        $message->params = [
            'from'   => $from,
            'to'     => $to,
            'amount' => $amount,
        ];

        return $this->call($message);
    }
}
