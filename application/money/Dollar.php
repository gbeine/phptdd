<?php

namespace money;

class Dollar {

	private $amount;

	function __construct($amount) {
		$this->amount = $amount;
	}

	function times($multiplier) {
		$this->amount *= $multiplier;
		return new Dollar(null);
	}

	function amount() {
		return $this->amount;
	}
}
