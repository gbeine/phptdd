<?php

namespace money;

class Bank {

	function reduce(Expression $exp, $currency) {
		return $exp->reduce($currency);
	}
}
