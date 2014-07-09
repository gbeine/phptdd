<?php

namespace money;

class MoneyTest extends \PHPUnit_Framework_TestCase {

	function testEquals() {
		$five = Money::dollar(5);
		$this->assertTrue($five->equals(Money::dollar(5)));
		$this->assertFalse($five->equals(Money::dollar(4)));

		$four = new Euro(4);
		$this->assertTrue($four->equals(new Euro(4)));
		$this->assertFalse($four->equals(new Euro(6)));

		$this->assertFalse($five->equals(new Euro(5)));
	}

}
