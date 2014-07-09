<?php

namespace money;

abstract class Money {

	protected $amount;

	function equals(Money $other) {
		return get_class($other) === get_class($this) &&
			$this->amount === $other->amount;
	}

	static function dollar($amount) {
		return new Dollar($amount);
	}

	static function euro($amount) {
		return new Euro($amount);
	}
}
