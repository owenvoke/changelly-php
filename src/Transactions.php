<?php

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
}
