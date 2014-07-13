<?php

namespace web;

class WebTest extends \PHPUnit_Extensions_SeleniumTestCase {

	protected $captureScreenshotOnFailure = TRUE;
	protected $screenshotPath = '/tmp/screenshots';
	protected $screenshotUrl = 'file:///tmp/screenshots';

	private static $driver = null;

    protected function setUp() {
        $this->setBrowser('*firefox');
        $this->setBrowserUrl('http://www.google.com/');
        self::$driver = $this->drivers[0];
        $this->assertNotNull(self::$driver);
    }

    public static function tearDownAfterClass() {
    	if (null !== self::$driver) {
	    	self::$driver->shutDownSeleniumServer();
    	}
    }

    public function testTitle() {
        $this->open('http://www.google.com/');
        $this->assertTitle('Google');
    }
}

?>
