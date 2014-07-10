<?php

namespace money;

class Bank {

	function reduce(Expression $exp, $currency) {
		if ($exp instanceof Sum) {
			$amount = $exp->addend->amount() + $exp->augend->amount();
			return new Money($amount, $currency);
		}
		return null;
	}
}
