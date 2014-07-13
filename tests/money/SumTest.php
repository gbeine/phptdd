<?php

namespace money;

class SumTest extends \PHPUnit_Framework_TestCase {

	private $bankStub;

	public function setUp() {
		$valueMap = array(
				array("USD", "USD", 1),
				array("EUR", "USD", 2)
		);

		$this->bankStub = $this->getMock('money\Bank');
		$this->bankStub->expects($this->any())
			->method('rate')
			->will($this->returnValueMap($valueMap));
	}

	public function testAddition() {
		$sum = Money::dollar(5)->plus(Money::dollar(5));
		$bank = new Bank();
		$bank->addRate("USD", "EUR", 4);
		$reduced = $sum->reduce($bank, "USD");
		$this->assertEquals(Money::dollar(10), $reduced);
		$reduced = $sum->reduce($bank, "EUR");
		$this->assertNotEquals(Money::dollar(10), $reduced);
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
		$result = $sum->reduce($this->bankStub, "USD");
		$this->assertEquals(Money::dollar(20), $result);
	}
}
