<?php

namespace money;

class Dollar {

	var $amount;

	function __construct($amount) {
		$this->amount = $amount;
	}

	function times($multiplier) {
		$this->amount *= $multiplier;
	}
}
