<?php

namespace money;

class Sum implements Expression {

	var $augend;
	var $addend;

	function __construct($augend, $addend) {
		$this->augend = $augend;
		$this->addend = $addend;
	}
}
