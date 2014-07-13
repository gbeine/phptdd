<?php

namespace money;

class RateTest extends \PHPUnit\Persistence\AbstractTestCase {

	private $em;

	protected function setUp() {
		parent::setUp();
		$this->em = $this->getEntityManager();
	}

	public function getDataSet() {
		return $this->createFlatXMLDataSet(dirname(__FILE__).'/../_files/rates.xml');
	}

	function testRatePersistence() {
		$this->assertEquals(1, $this->getConnection()->getRowCount('rates'));

		$rate = new Rate("EUR", "USD", 2);
		$this->em->persist($rate);
		$this->em->flush();
		$this->assertEquals(2, $this->getConnection()->getRowCount('rates'));
	}
}