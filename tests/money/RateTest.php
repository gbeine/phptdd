<?php

namespace money;

use PHPUnit\Persistence\ArrayDataSet;

class RateTest extends \PHPUnit\Persistence\AbstractTestCase {

	private $em;

	protected function setUp() {
		parent::setUp();
		$this->em = $this->getEntityManager();
	}

	public function getDataSet() {
		$fileDataSet = $this->createFlatXMLDataSet(dirname(__FILE__).'/../_files/rates.xml');

		$compositeDs = new \PHPUnit_Extensions_Database_DataSet_CompositeDataSet();
		$compositeDs->addDataSet($fileDataSet);
		$compositeDs->addDataSet($this->localDataSet());

		return $compositeDs;
	}

	function testRatePersistence() {
		$this->assertEquals(3, $this->getConnection()->getRowCount('rates'));

		$rate = new Rate("EUR", "USD", 2);
		$this->em->persist($rate);
		$this->em->flush();
		$this->assertEquals(4, $this->getConnection()->getRowCount('rates'));
	}

	/**
	 * @depends testRatePersistence
	 */
	function testQueryTable() {
		$queryTable = $this->getConnection()->createQueryTable(
				'rates', 'SELECT * FROM rates'
		);
		$expectedTable = $this->expectedDataSet()->getTable("rates");
		$this->assertTablesEqual($expectedTable, $queryTable);
	}

	/**
	 * @depends testQueryTable
	 */
	function testDataSet() {
		$dataSet = $this->getConnection()->createDataSet(array('rates'));
		$expectedDataSet = $this->expectedDataSet();
		$this->assertDataSetsEqual($expectedDataSet, $dataSet);
	}

	function testArrayDataSet() {
		$queryTable = $this->getConnection()->createQueryTable(
				'rates', 'SELECT * FROM rates WHERE toCurrency="USD"'
		);
		$this->assertEquals(1, $queryTable->getRowCount());
	}

	private function localDataSet() {
		return new ArrayDataSet(array(
				'rates' 	=> array(
						array( 'id' => 2, 'fromCurrency' => "USD", 'toCurrency' => "KGS", 'rate' => "50"),
						array( 'id' => 3, 'fromCurrency' => "EUR", 'toCurrency' => "KGS", 'rate' => "45"),
				)
		));
	}

	private function expectedDataSet() {
		return new ArrayDataSet(array(
			'rates' 	=> array(
				array( 'id' => 1, 'fromCurrency' => "USD", 'toCurrency' => "USD", 'rate' => "1"),
				array( 'id' => 2, 'fromCurrency' => "USD", 'toCurrency' => "KGS", 'rate' => "50"),
				array( 'id' => 3, 'fromCurrency' => "EUR", 'toCurrency' => "KGS", 'rate' => "45"),
			)
		));
	}
}
