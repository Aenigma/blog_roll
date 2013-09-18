<?php
App::uses('Rating', 'Model');

/**
 * Rating Test Case
 *
 */
class RatingTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.rating',
		'app.article',
		'app.user',
		'app.article_image',
		'app.comment',
		'app.category',
		'app.articles_category'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Rating = ClassRegistry::init('Rating');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Rating);

		parent::tearDown();
	}

}
