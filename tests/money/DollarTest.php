<?php

namespace money;

class DollarTest extends \PHPUnit_Framework_TestCase {

	public function testMultiplication() {
		$four = Money::dollar(4);
		$this->assertEquals(Money::dollar(8), $four->times(2));
		$this->assertEquals(Money::dollar(12), $four->times(3));
	}

	public function testEquals() {
		$five = Money::dollar(5);
		$this->assertTrue($five->equals(Money::dollar(5)));
		$this->assertFalse($five->equals(Money::dollar(4)));
	}

	public function testFactory() {
		$eight = Money::dollar(8);
		$this->assertInstanceOf('money\Dollar', $eight);
	}
}
