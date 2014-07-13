<?php

namespace money;

class Money implements Expression {

	protected $amount;
	protected $currency;

	function __construct($amount, $currency) {
		$this->amount = $amount;
		$this->currency = $currency;
	}

	function equals(Money $other) {
		return $this->currency === $other->currency &&
			$this->amount === $other->amount;
	}

	function times($multiplier) {
		return new Money($this->amount * $multiplier, $this->currency);
	}

	function plus(Expression $add) {
		return new Sum($this, $add);
	}

	function reduce(iBank $bank, $to) {
		$rate = $bank->rate($this->currency, $to);
		return new Money($this->amount / $rate, $to);
	}

	function __toString() {
		return "{ Money (" . $this->amount . ", '" . $this->currency . "') }";
	}

	function amount() {
		return $this->amount;
	}

	function currency() {
		return $this->currency;
	}

	static function dollar($amount) {
		return self::factory($amount, "USD");
	}

	static function euro($amount) {
		return new Money($amount, "EUR");
	}

	static function factory($amount, $currency) {
		static $money = array();
		if ( ! array_key_exists($amount, $money)) {
			$money[$amount] = new Money($amount, $currency);
		}
		return $money[$amount];
	}

}
