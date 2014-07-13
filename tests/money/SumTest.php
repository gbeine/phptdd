<?php

namespace money;

class SumTest extends \PHPUnit_Framework_TestCase implements iBank {

	private $bankStub;
	private $valueMap = array(
				array("USD", "USD", 1),
				array("EUR", "USD", 2),
				array("USD", "EUR", 2)
			);

	private $wasCalled;

	public function setUp() {
		$this->bankStub = $this->getMock('money\Bank');
		$this->bankStub->expects($this->any())
			->method('rate')
			->will($this->returnValueMap($this->valueMap));

		$this->wasCalled = false;
	}

	public function testAddition() {
		$sum = Money::dollar(5)->plus(Money::dollar(5));

		$bankMock = $this->getMock('money\Bank');
		$bankMock->expects($this->exactly(4))
			->method('rate')
			->with($this->equalTo("USD"), $this->isType('string'))
			->will($this->returnValueMap($this->valueMap));
		$bankMock->expects($this->never())
			->method('addRate');

		$reduced = $sum->reduce($bankMock, "USD");
		$this->assertEquals(Money::dollar(10), $reduced);
		$reduced = $sum->reduce($bankMock, "EUR");
		$this->assertEquals(Money::euro(5), $reduced);
	}

	public function testSumPlusMoney() {
		$five = Money::dollar(5);
		$ten = Money::euro(10);

		$sum = new Sum($five, $ten);
		$sum = $sum->plus($five);
		$result = $sum->reduce($this->bankStub, "USD");
		$this->assertEquals(Money::dollar(15), $result);
	}

	public function testSumTimes() {
		$five = Money::dollar(5);
		$ten = Money::euro(10);

		$sum = new Sum($five, $ten);
		$sum = $sum->times(2);
		$result = $sum->reduce($this, "USD");
		$this->assertEquals(Money::dollar(20), $result);
		$this->assertTrue($this->wasCalled);
	}

	public function rate($from, $to) {
		$this->wasCalled = true;
		if ($from === $to)
			return 1;
		else
			return 2;
	}
}
