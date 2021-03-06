<?php

namespace money;

class MoneyTest extends \PHPUnit_Framework_TestCase {

	function testEquals() {
		$five = Money::dollar(5);
		$this->assertTrue($five->equals(Money::dollar(5)));
		$this->assertFalse($five->equals(Money::dollar(4)));

		$four = Money::euro(4);
		$this->assertTrue($four->equals(Money::euro(4)));
		$this->assertFalse($four->equals(Money::euro(6)));

		$this->assertFalse($five->equals(Money::euro(5)));
	}

	function testCurrency() {
		$this->assertEquals("EUR", Money::euro(5)->currency());
		$this->assertEquals("USD", Money::dollar(5)->currency());
	}

	public function testPlusReturnsSum() {
		$five = Money::dollar(5);
		$sum = $five->plus($five);
		$this->assertEquals($five, $sum->augend());
		$this->assertEquals($five, $sum->addend());
	}

	public function testValueCache() {
		$five = Money::dollar(5);
		$anotherFive = Money::dollar(5);
		$this->assertEquals($five, $anotherFive);
		$this->assertSame($five, $anotherFive);
		$ten = Money::euro(10);
		$anotherTen = Money::euro(10);
		$this->assertSame($ten, $anotherTen);
		$fiveEuro = Money::euro(5);
		$this->assertNotSame($five, $fiveEuro);
	}

	public function testFactory() {
		$fiveDollar = Money::factory(5, "USD");
		$this->assertEquals(Money::dollar(5), $fiveDollar);
		$fiveEuro = Money::factory(5, "EUR");
		$this->assertEquals(Money::euro(5), $fiveEuro);
	}
}
