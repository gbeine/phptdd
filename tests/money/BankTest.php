<?php

namespace money;

class BankTest extends \PHPUnit\Bank\AbstractTestCase {

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
