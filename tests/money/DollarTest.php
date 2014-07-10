<?php

namespace money;

class DollarTest extends \PHPUnit_Framework_TestCase {

	public function testMultiplication() {
		$four = Money::dollar(4);
		$this->assertEquals(Money::dollar(8), $four->times(2));
		$this->assertEquals(Money::dollar(12), $four->times(3));
	}

	public function testFactory() {
		$eight = Money::dollar(8);
		$this->assertInstanceOf('money\Money', $eight);
		$this->assertEquals('USD', $eight->currency());
	}

	public function testAddition() {
		$sum = Money::dollar(5)->plus(Money::dollar(5));
		$bank = new Bank();
		$reduced = $bank->reduce($sum, "USD");
		$this->assertEquals(Money::dollar(10), $reduced);
	}
}
