<?php

namespace PHPUnit\Money;

use money\Money;

class IsEqualTest extends \PHPUnit_Framework_TestCase {

	public function testIsEqual() {
		$one = Money::dollar(1);
		$two = Money::dollar(2);

		$constraint = new IsEqual($one);

		$this->assertTrue($constraint->matches($one));
		$this->assertFalse($constraint->matches($two));
	}
}
