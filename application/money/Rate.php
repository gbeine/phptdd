<?php

namespace money;

class Rate {
	private $id;
	private $from;
	private $to;
	private $rate;

	function __construct($from, $to, $rate) {
		$this->from = $from;
		$this->to = $to;
		$this->rate = $rate;
	}
}
