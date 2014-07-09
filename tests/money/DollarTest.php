<?php

namespace money;

class DollarTest extends \PHPUnit_Framework_TestCase {

	public function testMultiplication() {
		$four = new Dollar(4);
		$this->assertEquals(new Dollar(8), $four->times(2));
		$this->assertEquals(new Dollar(12), $four->times(3));
	}

	public function testEquals() {
		$five = new Dollar(5);
		$this->assertTrue($five->equals(new Dollar(5)));
		$this->assertFalse($five->equals(new Dollar(4)));
	}
}
