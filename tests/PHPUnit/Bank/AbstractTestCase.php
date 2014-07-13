<?php

namespace PHPUnit\Bank;

use money\Money;

abstract class AbstractTestCase extends \PHPUnit_Framework_TestCase {

	public static function assertMoneyValue($expected, Money $actual) {
		return $actual->amount() === $expected;
	}
}
