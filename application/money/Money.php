<?php

namespace money;

abstract class Money {

	protected $amount;

	function equals(Money $other) {
		return $this->amount === $other->amount;
	}
}
