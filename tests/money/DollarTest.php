<?php

namespace money;

class DollarTest extends \PHPUnit_Framework_TestCase {

	public function testMultiplication() {
		$five = new Dollar(5);
		$ten = $five->times(2);
		$this->assertEquals(new Dollar(10), $ten);
	}

	public function testSideEffects() {
		$four = new Dollar(4);
		$eight = $four->times(2);
		$this->assertEquals(new Dollar(8), $eight);
		$twelve = $four->times(3);
		$this->assertEquals(new Dollar(12), $twelve);
	}

	public function testEquals() {
		$five = new Dollar(5);
		$this->assertTrue($five->equals(new Dollar(5)));
		$this->assertFalse($five->equals(new Dollar(4)));
	}
}
