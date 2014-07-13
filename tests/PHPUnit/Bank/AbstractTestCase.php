<?php

namespace PHPUnit\Bank;

use money\Money;

abstract class AbstractTestCase extends \PHPUnit_Framework_TestCase {

	public static function assertMoneyValue($expected, Money $actual, $message = '') {
		$constraint = new \PHPUnit_Framework_Constraint_IsEqual(
			$expected, 0, 10, FALSE, FALSE
		);
		return self::assertThat($actual->amount(), $constraint, $message);
	}
}
