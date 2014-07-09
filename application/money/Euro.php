<?php

namespace money;

class Euro extends Money {

	function __construct($amount, $currency) {
		parent::__construct($amount, $currency);
	}

	function times($multiplier) {
		return Money::euro($this->amount * $multiplier);
	}
}
