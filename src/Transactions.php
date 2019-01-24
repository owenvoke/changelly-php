<?php

declare(strict_types=1);

namespace pxgamer\Changelly;

use pxgamer\Changelly\Traits\ApiCallable;

class Transactions
{
    use ApiCallable;

    public function get()
    {
        $message = new Message();
        $message->method = 'getTransactions';

        return $this->call($message);
    }

    public function status(string $transactionId)
    {
        $message = new Message();
        $message->method = 'getStatus';
        $message->params = [
            'id' => $transactionId,
        ];

        return $this->call($message);
    }
}
