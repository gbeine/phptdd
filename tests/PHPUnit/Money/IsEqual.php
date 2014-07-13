<?php

namespace PHPUnit\Money;

use money\Money;

class IsEqual extends \PHPUnit_Framework_Constraint {

	private $value;

	public function __construct(Money $value) {
		$this->value = $value;
	}

	public function matches(Money $other) {
		$result = $this->value->currency() === $other->currency();
		$result = $result && $this->value->amount() === $other->amount();
		return $result;
	}

	public function toString() {
		return ' is equal to ' . $this->value;
	}
}
