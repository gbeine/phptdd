<?php

namespace money;

class Dollar extends Money {

	function __construct($amount, $currency) {
		parent::__construct($amount, $currency);
	}

	function times($multiplier) {
		return Money::dollar($this->amount * $multiplier);
	}
}
