<?php
App::uses('PostsController', 'Controller');

/**
 * PostsController Test Case
 *
 */
class PostsControllerTest extends ControllerTestCase {

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
 * test記事一覧を表示できる method
 *
 * @return void
 */
	public function test記事一覧を表示できる() {
		$result = $this->testAction('/posts/index', array('return' => 'vars'));
		$posts = $result['posts'];
		$this->assertCount(10, $posts);
		$this->assertEquals('PHPMatsuri 2012に参加してきた', $posts[0]['Post']['title']);
		$this->assertEquals('Node.jsとWebSocket.IOでチャットアプリを作る', $posts[1]['Post']['title']);
		$this->assertEquals('NetBeansでFuelPHPのユニットテストを実行する方法', $posts[2]['Post']['title']);
		$this->assertEquals('Fukuoka.php Vol.2 で発表してきました', $posts[3]['Post']['title']);
		$this->assertEquals('CentOS開発環境の構築', $posts[4]['Post']['title']);
		$this->assertEquals('お久しぶりです！', $posts[5]['Post']['title']);
		$this->assertEquals('Fukuoka.php Vol.1 参加報告', $posts[6]['Post']['title']);
		$this->assertEquals('軽量Rubyセミナー 参加報告', $posts[7]['Post']['title']);
		$this->assertEquals('福岡アクセシビリティセミナー Vol.1 参加報告', $posts[8]['Post']['title']);
		$this->assertEquals('ブログ始めました', $posts[9]['Post']['title']);
	}

/**
 * testキーワード検索 method
 *
 * @return void
 */
	public function testキーワード検索() {
		$data = array('keyword' => 'PHP');
		$result = $this->testAction('/posts/index', array('return' => 'vars', 'data' => $data, 'method' => 'get'));
		$posts = $result['posts'];
		$this->assertCount(5, $posts);
		$this->assertEquals('PHPMatsuri 2012に参加してきた', $posts[0]['Post']['title']);
		$this->assertEquals('NetBeansでFuelPHPのユニットテストを実行する方法', $posts[1]['Post']['title']);
		$this->assertEquals('Fukuoka.php Vol.2 で発表してきました', $posts[2]['Post']['title']);
		$this->assertEquals('CentOS開発環境の構築', $posts[3]['Post']['title']);
		$this->assertEquals('Fukuoka.php Vol.1 参加報告', $posts[4]['Post']['title']);
	}

/**
 * test作者検索 method
 *
 * @return void
 */
	public function test作者検索() {
		$data = array('author_id' => 1);
		$result = $this->testAction('/posts/index', array('return' => 'vars', 'data' => $data, 'method' => 'get'));
		$posts = $result['posts'];
		$this->assertCount(2, $posts);
		$this->assertEquals('お久しぶりです！', $posts[0]['Post']['title']);
		$this->assertEquals('ブログ始めました', $posts[1]['Post']['title']);
	}

/**
 * test作者複数検索 method
 *
 * @return void
 */
	public function test作者複数検索() {
		$data = array('author_id' => '1|3');
		$result = $this->testAction('/posts/index', array('return' => 'vars', 'data' => $data, 'method' => 'get'));
		$posts = $result['posts'];
		$this->assertCount(3, $posts);
		$this->assertEquals('CentOS開発環境の構築', $posts[0]['Post']['title']);
		$this->assertEquals('お久しぶりです！', $posts[1]['Post']['title']);
		$this->assertEquals('ブログ始めました', $posts[2]['Post']['title']);
	}

/**
 * test日付検索 method
 *
 * @return void
 */
	public function test日付検索() {
		$data = array('from' => '2012-06-01', 'to' => '2012-09-30');
		$result = $this->testAction('/posts/index', array('return' => 'vars', 'data' => $data, 'method' => 'get'));
		$posts = $result['posts'];
		$this->assertCount(4, $posts);
		$this->assertEquals('NetBeansでFuelPHPのユニットテストを実行する方法', $posts[0]['Post']['title']);
		$this->assertEquals('Fukuoka.php Vol.2 で発表してきました', $posts[1]['Post']['title']);
		$this->assertEquals('CentOS開発環境の構築', $posts[2]['Post']['title']);
		$this->assertEquals('お久しぶりです！', $posts[3]['Post']['title']);
	}

}
