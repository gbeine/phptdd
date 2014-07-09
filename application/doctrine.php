<?php

class Doctrine {

	static function getConfig() {
		static $config;
		if ($config === null) {
			$paths = array(
				dirname(__FILE__).'/../database'
			);
			$config = Doctrine\ORM\Tools\Setup::createXMLMetadataConfiguration($paths);
		}
		return $config;
	}
}
