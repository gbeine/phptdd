<?php

namespace money;

class Money {

	protected $amount;
	protected $currency;

	function __construct($amount, $currency) {
		$this->amount = $amount;
		$this->currency = $currency;
	}

	function equals(Money $other) {
		return get_class($other) === get_class($this) &&
			$this->amount === $other->amount;
	}

	function times($multiplier) {
		return new Money($this->amount * $multiplier, $this->currency);
	}

	function amount() {
		return $this->amount;
	}

	function currency() {
		return $this->currency;
	}

	static function dollar($amount) {
		return new Money($amount, "USD");
	}

	static function euro($amount) {
		return new Money($amount, "EUR");
	}
}
