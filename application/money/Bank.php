<?php

namespace money;

class Bank {

	private $rates = array();

	function reduce(Expression $exp, $currency) {
		return $exp->reduce($this, $currency);
	}

	function addRate($from, $to, $rate) {
		$this->rates[$from.$to] = $rate;
	}

	function rate($from, $to) {
		return $this->rates[$from.$to];
	}
}
