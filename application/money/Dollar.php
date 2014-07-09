<?php

namespace money;

class Dollar {

	private $amount;

	function __construct($amount) {
		$this->amount = $amount;
	}

	function times($multiplier) {
		return new Dollar($this->amount * $multiplier);
	}

	function equals(Dollar $other) {
		return $this->amount === $other->amount;
	}

	function amount() {
		return $this->amount;
	}
}
