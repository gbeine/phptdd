<?php

namespace money;

class BankTest extends \PHPUnit\Bank\AbstractTestCase {

	public function testReduceMoney() {
		$bank = new Bank();
		$reduced = $bank->reduce(Money::dollar(5), "USD");
		$this->assertMoneyEquals(Money::dollar(5), $reduced);
	}

	public function testReduceMoneyDifferentCurrencies() {
		$bank = new Bank();
		$bank->addRate("EUR", "USD", 2);

		runkit_method_rename(
			'money\Money',
			'reduce',
			'original_reduce'
		);
		runkit_method_add(
			'money\Money',
			'reduce',
			'$bank, $to',
			'print "Reduce $to"; return $this->original_reduce($bank, $to);'
		);


		$reduced = $bank->reduce(Money::euro(10), "USD");
		$this->assertMoneyEquals(Money::dollar(5), $reduced);
	}

	public function testMixedAddition() {
		$five = Money::dollar(5);
		$ten = Money::euro(10);
		$bank = new Bank();
		$bank->addRate("EUR", "USD", 2);
		$result = $bank->reduce($five->plus($ten), "USD");
		$this->assertMoneyEquals(Money::dollar(10), $result);
	}
}
