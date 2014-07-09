<?php

namespace money;

class DollarTest extends \PHPUnit_Framework_TestCase {

	public function testMultiplication() {
		$five = new Dollar(5);
		$ten = $five->times(2);
		$this->assertEquals(10, $ten->amount());
	}

	public function testSideEffects() {
		$four = new Dollar(4);
		$eight = $four->times(2);
		$this->assertEquals(8, $eight->amount());
		$twelve = $four->times(3);
		$this->assertEquals(12, $twelve->amount());
	}

	public function testEquals() {
		$five = new Dollar(5);
		$this->assertTrue($five->equals(new Dollar(5)));
	}
}
