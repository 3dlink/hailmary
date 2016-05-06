<?php
App::uses('Pass', 'Model');

/**
 * Pass Test Case
 *
 */
class PassTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.pass',
		'app.code',
		'app.game'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Pass = ClassRegistry::init('Pass');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Pass);

		parent::tearDown();
	}

}
