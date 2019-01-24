<?php

declare(strict_types=1);

namespace pxgamer\Changelly;

use PHPUnit\Framework\TestCase;

class CurrenciesTest extends TestCase
{
    /**
     * @var Currencies
     */
    private $currencies;

    public function setUp()
    {
        $this->currencies = new Currencies();

        $this->currencies->setApiKey(getenv('CHANGELLY_API_KEY'));
        $this->currencies->setSecret(getenv('CHANGELLY_SECRET_KEY'));
    }

    public function testCanGetCurrencies()
    {
        $result = $this->currencies->get();

        $this->assertInstanceOf(\stdClass::class, $result);
        $this->assertObjectHasAttribute('id', $result);
    }

    public function testCanGetCurrenciesWithResults()
    {
        $result = $this->currencies->get();

        $this->assertObjectHasAttribute('result', $result);
        $this->assertInternalType('array', $result->result);
        $this->assertNotEmpty($result->result);
    }

    public function testCanGetFullCurrencies()
    {
        $result = $this->currencies->getFull();

        $this->assertInstanceOf(\stdClass::class, $result);
        $this->assertObjectHasAttribute('id', $result);
        $this->assertObjectHasAttribute('result', $result);
        $this->assertInternalType('array', $result->result);
        $this->assertNotEmpty($result->result);
    }

    public function testCanGetFullCurrenciesWithResults()
    {
        $result = $this->currencies->getFull();

        $this->assertObjectHasAttribute('result', $result);
        $this->assertInternalType('array', $result->result);
        $this->assertNotEmpty($result->result);
    }

    public function testCanGetFullCurrenciesWithFirstResult()
    {
        $result = $this->currencies->getFull();

        $this->assertNotEmpty($result->result);

        $resultFirst = $result->result[0];
        $this->assertInstanceOf(\stdClass::class, $resultFirst);
        $this->assertObjectHasAttribute('name', $resultFirst);
        $this->assertObjectHasAttribute('fullName', $resultFirst);
        $this->assertObjectHasAttribute('enabled', $resultFirst);
    }

    public function testCanGetMinimumAmount()
    {
        $result = $this->currencies->minimumAmount('btc', 'etc');

        $this->assertObjectHasAttribute('result', $result);
        $this->assertInternalType('string', $result->result);
        $this->assertTrue(is_numeric($result->result) || $result->result === 'Infinity');
    }

    public function testCanGetExchangeAmount()
    {
        $result = $this->currencies->exchangeAmount('btc', 'etc', 1.0);

        $this->assertObjectHasAttribute('result', $result);
        $this->assertInternalType('string', $result->result);
        $this->assertTrue(is_numeric($result->result));
    }
}
