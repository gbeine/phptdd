<?php

namespace money;

class Dollar extends Money {

	function __construct($amount) {
		$this->amount = $amount;
	}

	function times($multiplier) {
		return new Dollar($this->amount * $multiplier);
	}

	function amount() {
		return $this->amount;
	}

	function currency() {
		return "USD";
	}
}
