<?php
App::uses('ArticlesCategory', 'Model');

/**
 * ArticlesCategory Test Case
 *
 */
class ArticlesCategoryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.articles_category',
		'app.category',
		'app.article',
		'app.user',
		'app.article_image',
		'app.comment',
		'app.rating'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ArticlesCategory = ClassRegistry::init('ArticlesCategory');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ArticlesCategory);

		parent::tearDown();
	}

}
