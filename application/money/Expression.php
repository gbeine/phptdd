<?php

namespace money;

interface Expression {

	public function reduce(Bank $bank, $to);

}
