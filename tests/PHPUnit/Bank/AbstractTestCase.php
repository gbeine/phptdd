<?php

namespace PHPUnit\Bank;

use money\Money;
use PHPUnit\Money\IsEqual;

abstract class AbstractTestCase extends \PHPUnit_Framework_TestCase {

	public static function assertMoneyValue($expected, Money $actual, $message = '') {
		$constraint = new \PHPUnit_Framework_Constraint_IsEqual(
			$expected, 0, 10, FALSE, FALSE
		);
		return self::assertThat($actual->amount(), $constraint, $message);
	}

	public static function assertMoneyCurrency($expected, Money $actual, $message = '') {
		$constraint = new \PHPUnit_Framework_Constraint_IsEqual(
			$expected, 0, 10, FALSE, FALSE
		);
		return self::assertThat($actual->currency(), $constraint, $message);
	}

	public static function assertMoneyEquals(Money $expected, Money $actual, $message = '') {
		$constraint = new IsEqual($expected);
		return self::assertThat($actual, $constraint, $message);
	}
}
