<?php

namespace money;

class Bank implements iBank {

	private $rates = array();

	function reduce(Expression $exp, $currency) {
		return $exp->reduce($this, $currency);
	}

	function addRate($from, $to, $rate) {
		$this->rates[$from.$to] = $rate;
	}

	function rate($from, $to) {
		if ($from === $to) return 1;
		return $this->rates[$from.$to];
	}
}
