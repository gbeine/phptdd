<?php

namespace money;

class Bank {

	function reduce(Expression $exp, $currency) {
		if ($exp instanceof Money) {
			return $exp;
		}
		if ($exp instanceof Sum) {
			return $exp->reduce($currency);
		}
		return null;
	}
}
