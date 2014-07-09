<?php

namespace money;

class Euro extends Money {

	function __construct($amount, $currency) {
		$this->amount = $amount;
		$this->currency = $currency;
	}

	function times($multiplier) {
		return new Euro($this->amount * $multiplier);
	}

	function amount() {
		return $this->amount;
	}

}
