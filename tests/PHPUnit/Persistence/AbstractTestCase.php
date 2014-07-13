<?php

namespace PHPUnit\Persistence;

use \Doctrine;

abstract class AbstractTestCase extends \PHPUnit_Extensions_Database_TestCase {

	public function getConnection() {
 		$pdo = $this->getEntityManager()->getConnection()->getWrappedConnection();

		return $this->createDefaultDBConnection($pdo, ':memory:');
	}

	protected function getEntityManager() {
		static $entityManager;

		$connectionOptions = array(
			'driver' => 'pdo_sqlite',
			'memory' => true
		);

		if ($entityManager === null) {
			$entityManager = \Doctrine\ORM\EntityManager::create($connectionOptions, Doctrine::getConfig());

  			$tool = new \Doctrine\ORM\Tools\SchemaTool($entityManager);
 		  	$classes = $entityManager->getMetaDataFactory()->getAllMetaData();

 			$tool->dropSchema($classes);
 			$tool->createSchema($classes);
		}

		return $entityManager;
	}
}
