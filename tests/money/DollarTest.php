<?php

namespace money;

class DollarTest extends \PHPUnit_Framework_TestCase {

	public function testMultiplication() {
		$five = new Dollar(5);
		$five->times(2);
		$this->assertEquals(10, $five->amount());
	}

	public function testSideEffects() {
		$four = new Dollar(4);
		$four->times(2);
		$this->assertEquals(8, $four->amount());
		$four->times(3);
		$this->assertEquals(12, $four->amount());
	}
}
