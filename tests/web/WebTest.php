<?php

namespace web;

class WebTest extends \PHPUnit_Extensions_SeleniumTestCase {

	protected $captureScreenshotOnFailure = TRUE;
	protected $screenshotPath = '/tmp/screenshots';
	protected $screenshotUrl = 'file:///tmp/screenshots';

    protected function setUp() {
        $this->setBrowser('*firefox');
        $this->setBrowserUrl('http://www.google.com/');
    }

    protected function tearDown() {
    	$this->shutDownSeleniumServer();
    }

    public function testTitle() {
        $this->open('http://www.google.com/');
        $this->assertTitle('Google Fail');
    }
}

?>
