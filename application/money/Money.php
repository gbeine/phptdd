<?php

namespace money;

abstract class Money {

	protected $amount;
	protected $currency;

	function equals(Money $other) {
		return get_class($other) === get_class($this) &&
			$this->amount === $other->amount;
	}

	function amount() {
		return $this->amount;
	}

	function currency() {
		return $this->currency;
	}

	static function dollar($amount) {
		return new Dollar($amount, "USD");
	}

	static function euro($amount) {
		return new Euro($amount, "EUR");
	}
}
