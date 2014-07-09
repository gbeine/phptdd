<?php

namespace money;

class EuroTest extends \PHPUnit_Framework_TestCase {

	public function testMultiplication() {
		$four = new Euro(4);
		$this->assertEquals(new Euro(8), $four->times(2));
		$this->assertEquals(new Euro(12), $four->times(3));
	}

	public function testEquals() {
		$five = new Euro(5);
		$this->assertTrue($five->equals(new Euro(5)));
		$this->assertFalse($five->equals(new Euro(4)));
	}
}
