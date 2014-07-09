<?php

namespace money;

class Dollar extends Money {

	function __construct($amount) {
		$this->amount = $amount;
	}

	function times($multiplier) {
		return new Dollar($this->amount * $multiplier);
	}

	function equals(Money $other) {
		return $this->amount === $other->amount;
	}

	function amount() {
		return $this->amount;
	}
}
