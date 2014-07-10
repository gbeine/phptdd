<?php

namespace money;

class Sum implements Expression {

	var $augend;
	var $addend;

	function __construct($augend, $addend) {
		$this->augend = $augend;
		$this->addend = $addend;
	}

	function reduce(Bank $bank, $to) {
		$amount = $this->addend->amount() + $this->augend->amount();
		return new Money($amount, $to);
	}
}
