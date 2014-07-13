<?php

namespace money;

class Sum implements Expression {

	private $augend;
	private $addend;

	function __construct(Expression $augend, Expression $addend) {
		$this->augend = $augend;
		$this->addend = $addend;
	}

	function reduce(Bank $bank, $to) {
		$amount = $this->augend->reduce($bank, $to)->amount() + $this->addend->reduce($bank, $to)->amount();
		return new Money($amount, $to);
	}

	function plus(Expression $addend) {
		return new Sum($this, $addend);
	}

	function times($multiplier) {
		return new Sum($this->augend->times($multiplier), $this->addend->times($multiplier));
	}

	function addend() {
		return $this->addend;
	}

	function augend() {
		return $this->augend;
	}
}
