<?php

namespace money;

class MoneyTest extends \PHPUnit_Framework_TestCase {

	function testEquals() {
		$five = Money::dollar(5);
		$this->assertTrue($five->equals(Money::dollar(5)));
		$this->assertFalse($five->equals(Money::dollar(4)));

		$four = Money::euro(4);
		$this->assertTrue($four->equals(Money::euro(4)));
		$this->assertFalse($four->equals(Money::euro(6)));

		$this->assertFalse($five->equals(Money::euro(5)));
	}

	function testCurrency() {
		$this->assertEquals("EUR", Money::euro(5)->currency());
		$this->assertEquals("USD", Money::dollar(5)->currency());
	}

	public function testAddition() {
		$sum = Money::dollar(5)->plus(Money::dollar(5));
		$bank = new Bank();
		$reduced = $bank->reduce($sum, "USD");
		$this->assertEquals(Money::dollar(10), $reduced);
		$reduced = $bank->reduce($sum, "EUR");
		$this->assertNotEquals(Money::dollar(10), $reduced);
	}

	public function testPlusReturnsSum() {
		$five = Money::dollar(5);
		$sum = $five->plus($five);
		$this->assertEquals($five, $sum->augend);
		$this->assertEquals($five, $sum->addend);
	}

	public function testReduceMoney() {
		$bank = new Bank();
		$reduced = $bank->reduce(Money::dollar(5), "USD");
		$this->assertEquals(Money::dollar(5), $reduced);
	}

	public function testReduceMoneyDifferentCurrencies() {
		$bank = new Bank();
		$bank->addRate("EUR", "USD", 2);
		$reduced = $bank->reduce(Money::euro(10), "USD");
		$this->assertEquals(Money::dollar(5), $reduced);
	}

	public function testMixedAddition() {
		$five = Money::dollar(5);
		$ten = Money::euro(10);
		$bank = new Bank();
		$bank->addRate("EUR", "USD", 2);
		$result = $bank->reduce($five->plus($ten), "USD");
		$this->assertEquals(Money::dollar(10), $result);
	}
}
