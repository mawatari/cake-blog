<?php
App::uses('Post', 'Model');

/**
 * Post Test Case
 *
 * @property Post $Post
 */
class PostTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.post',
		'app.author'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Post = ClassRegistry::init('Post');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Post);

		parent::tearDown();
	}


/**
 * test単一のキーワード method
 *
 * @return void
 */
	public function test単一のキーワード() {
		$expected = 'keyword';
		$actual = $this->Post->multipleKeywords('keyword', 'and');
		$this->assertEquals($expected, $actual);
	}

/**
 * testAND接続 method
 *
 * @return void
 */
	public function testAND検索() {
		$expected = 'keyword1+キーワード2';
		$actual = $this->Post->multipleKeywords('keyword1 キーワード2', 'and');
		$this->assertEquals($expected, $actual);
	}

/**
 * testOR接続 method
 *
 * @return void
 */
	public function testOR検索() {
		$expected = 'keyword1,キーワード2';
		$actual = $this->Post->multipleKeywords('keyword1 キーワード2', 'or');
		$this->assertEquals($expected, $actual);
	}

/**
 * testオプションの省略 method
 *
 * @return void
 */
	public function testオプションの省略() {
		$expected = 'keyword1+キーワード2';
		$actual = $this->Post->multipleKeywords('keyword1 キーワード2');
		$this->assertEquals($expected, $actual);
	}

/**
 * test不正なオプション method
 *
 * @return void
 */
	public function test不正なオプション() {
		$expected = 'keyword1+キーワード2';
		$actual = $this->Post->multipleKeywords('keyword1 キーワード2', 'foo');
		$this->assertEquals($expected, $actual);
	}

/**
 * test3件のキーワード method
 *
 * @return void
 */
	public function test3件のキーワード() {
		$expected = 'keyword1+キーワード2+きいわあど3';
		$actual = $this->Post->multipleKeywords('keyword1 キーワード2　きいわあど3', 'and');
		$this->assertEquals($expected, $actual);
	}

/**
 * test様々なスペースで区切られたキーワード method
 *
 * @dataProvider keywords_data_provider
 * @param $keyword
 * @return void
 */
	public function test様々なスペースで区切られたキーワード($keyword) {
		$expected = 'keyword1+キーワード2';
		$actual = $this->Post->multipleKeywords($keyword, 'and');
		$this->assertEquals($expected, $actual);
	}

/**
 * keywords_data_provider
 */
	public function keywords_data_provider() {
		return array(
			array("keyword1 キーワード2"),
			array("     keyword1 キーワード2  "),
			array("keyword1         キーワード2"),
			array("keyword1　キーワード2"),
			array("keyword1　　キーワード2"),
			array("keyword1 　　 　キーワード2　"),
			array("keyword1\nキーワード2"),
			array("keyword1\rキーワード2"),
			array("keyword1\r\nキーワード2"),
			array("keyword1\tキーワード2"),
			array("　keyword1\t キーワード2\r\n"),
		);
	}

}
