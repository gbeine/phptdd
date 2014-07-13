<?php

namespace PHPUnit\Money;

use money\Money;

class IsEqual extends \PHPUnit_Framework_Constraint {

	private $value;

	public function __construct(Money $value) {
		$this->value = $value;
	}
}
