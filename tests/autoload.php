<?php

spl_autoload_register(

	function($className) {
		$className = str_replace("_", "\\", $className);
		$className = ltrim($className, '\\');
		$fileName = '';
		$namespace = '';

		if ($lastNsPos = strripos($className, '\\'))
		{
			$namespace = substr($className, 0, $lastNsPos);
			$className = substr($className, $lastNsPos + 1);
			$fileName = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
		}
		$fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';

		if (file_exists(__DIR__.'/'.$fileName)) {
			require_once __DIR__.'/'.$fileName;
		}
	}

);
