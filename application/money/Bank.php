<?php

namespace money;

class Bank {

	function reduce(Expression $exp, $currency) {
		return $exp->reduce($this, $currency);
	}

	function addRate($from, $to, $rate) {

	}
}
