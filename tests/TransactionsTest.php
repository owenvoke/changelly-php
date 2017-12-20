<?php

namespace pxgamer\Changelly;

use PHPUnit\Framework\TestCase;

class TransactionsTest extends TestCase
{
    /**
     * @var Transactions
     */
    private $transactions;

    public function setUp()
    {
        $this->transactions = new Transactions();

        $this->transactions->setApiKey(getenv('CHANGELLY_API_KEY'));
        $this->transactions->setSecret(getenv('CHANGELLY_SECRET_KEY'));
    }

    public function testCanGetTransactions()
    {
        $result = $this->transactions->get();

        $this->assertInstanceOf(\stdClass::class, $result);
        $this->assertObjectHasAttribute('id', $result);
    }

    public function testCanGetTransactionsWithResults()
    {
        $result = $this->transactions->get();

        $this->assertObjectHasAttribute('result', $result);
        $this->assertInternalType('array', $result->result);
        $this->assertNotEmpty($result->result);
    }

    public function testCanGetTransactionsWithFirstResult()
    {
        $result = $this->transactions->get();

        $this->assertNotEmpty($result->result);

        $resultFirst = $result->result[0];
        $this->assertInstanceOf(\stdClass::class, $resultFirst);
        $this->assertObjectHasAttribute('id', $resultFirst);
        $this->assertObjectHasAttribute('createdAt', $resultFirst);
        $this->assertObjectHasAttribute('payinConfirmations', $resultFirst);
        $this->assertObjectHasAttribute('status', $resultFirst);
        $this->assertObjectHasAttribute('currencyFrom', $resultFirst);
        $this->assertObjectHasAttribute('currencyTo', $resultFirst);
    }

    public function testCanGetStatus()
    {
        $result = $this->transactions->status('aa744c63d736');

        $this->assertInstanceOf(\stdClass::class, $result);
        $this->assertObjectHasAttribute('id', $result);
        $this->assertObjectHasAttribute('result', $result);
        $this->assertInternalType('string', $result->result);
    }
}
