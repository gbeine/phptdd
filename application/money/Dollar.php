<?php

namespace money;

class Dollar extends Money {

	function __construct($amount, $currency) {
		$this->amount = $amount;
		$this->currency = $currency;
	}

	function times($multiplier) {
		return new Dollar($this->amount * $multiplier);
	}

	function amount() {
		return $this->amount;
	}
}
