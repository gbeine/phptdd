<?php

namespace money;

class Euro {

	private $amount;

	function __construct($amount) {
		$this->amount = $amount;
	}

	function times($multiplier) {
		return new Euro($this->amount * $multiplier);
	}

	function equals(Euro $other) {
		return $this->amount === $other->amount;
	}

	function amount() {
		return $this->amount;
	}
}
