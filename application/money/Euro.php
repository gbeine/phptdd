<?php

namespace money;

class Euro extends Money {

	function __construct($amount) {
		$this->amount = $amount;
	}

	function times($multiplier) {
		return new Euro($this->amount * $multiplier);
	}

	function amount() {
		return $this->amount;
	}
}
