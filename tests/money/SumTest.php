<?php

namespace money;

class SumTest extends \PHPUnit_Framework_TestCase {

	public function testSumPlusMoney() {
		$five = Money::dollar(5);
		$ten = Money::euro(10);
		$bank = new Bank();
		$bank->addRate("EUR", "USD", 2);
		$sum = new Sum($five, $ten);
		$sum = $sum->plus($five);
		$result = $sum->reduce($bank, "USD");
		$this->assertEquals(Money::dollar(15), $result);
	}

	public function testSumTimes() {
		$five = Money::dollar(5);
		$ten = Money::euro(10);
		$bank = new Bank();
		$bank->addRate("EUR", "USD", 2);
		$sum = new Sum($five, $ten);
		$sum = $sum->times(2);
		$result = $sum->reduce($bank, "USD");
		$this->assertEquals(Money::dollar(20), $result);
	}
}
