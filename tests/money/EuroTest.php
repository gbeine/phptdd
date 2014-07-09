<?php

namespace money;

class EuroTest extends \PHPUnit_Framework_TestCase {

	public function testMultiplication() {
		$four = Money::euro(4);
		$this->assertEquals(Money::euro(8), $four->times(2));
		$this->assertEquals(Money::euro(12), $four->times(3));
	}

	public function testFactory() {
		$eight = Money::euro(8);
		$this->assertInstanceOf('money\Euro', $eight);
	}
}
