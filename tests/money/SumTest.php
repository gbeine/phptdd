<?php

namespace money;

class SumTest extends \PHPUnit_Framework_TestCase {

	public function testSumPlusMoney() {
		$five = Money::dollar(5);
		$ten = Money::euro(10);

		$valueMap = array(
				array("USD", "USD", 1),
				array("EUR", "USD", 2)
		);

		$bankStub = $this->getMock('money\Bank');
		$bankStub->expects($this->any())
			->method('rate')
			->will($this->returnValueMap($valueMap));

		$sum = new Sum($five, $ten);
		$sum = $sum->plus($five);
		$result = $sum->reduce($bankStub, "USD");
		$this->assertEquals(Money::dollar(15), $result);
	}

	public function testSumTimes() {
		$five = Money::dollar(5);
		$ten = Money::euro(10);

		$bankStub = $this->getMock('money\Bank');
		$bankStub->expects($this->any())
			->method('rate')
			->will($this->onConsecutiveCalls(1,2));

		$sum = new Sum($five, $ten);
		$sum = $sum->times(2);
		$result = $sum->reduce($bankStub, "USD");
		$this->assertEquals(Money::dollar(20), $result);
	}
}
