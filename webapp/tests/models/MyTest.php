<?php

class MyTest extends CIUnit_TestCase {
	
	public function __construct($name = NULL, array $data = array(), $dataName = '')
	{
		parent::__construct($name, $data, $dataName);
	}

	public function setUp() {
		parent::setUp();
	}

	public function tearDown() {
		parent::tearDown();

	}

	public function test_mytest() {

		$this->assertEquals(1,1);
	}
}