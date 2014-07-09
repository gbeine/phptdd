<?php

namespace money;

class Euro extends Money {

	private $currency;

	function __construct($amount) {
		$this->amount = $amount;
		$this->currency = "EUR";
	}

	function times($multiplier) {
		return new Euro($this->amount * $multiplier);
	}

	function amount() {
		return $this->amount;
	}

	function currency() {
		return $this->currency;
	}
}
