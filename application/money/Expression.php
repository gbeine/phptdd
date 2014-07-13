<?php

namespace money;

interface Expression {

	public function reduce(iBank $bank, $to);

	public function plus(Expression $addend);

	public function times($multiplier);

}
