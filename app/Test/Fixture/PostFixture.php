<?php
/**
 * PostFixture
 *
 */
class PostFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'title' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'body' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'author_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'author_id' => array('column' => 'author_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'title' => 'ブログ始めました',
			'body' => 'これから日々のあれこれを記録していきたいと思います！URLは、 http://localhost/ です！！',
			'author_id' => 1,
			'created' => '2012-01-01 12:00:00',
			'modified' => '2012-01-01 12:00:00'
		),
		array(
			'id' => 2,
			'title' => '福岡アクセシビリティセミナー Vol.1 参加報告',
			'body' => '福岡アクセシビリティセミナー Vol.1に行ってきました。',
			'author_id' => 2,
			'created' => '2012-02-19 12:00:00',
			'modified' => '2012-02-19 12:00:00'
		),
		array(
			'id' => 3,
			'title' => '軽量Rubyセミナー 参加報告',
			'body' => '軽量Rubyセミナーに行ってきました。',
			'author_id' => 2,
			'created' => '2012-03-20 12:00:00',
			'modified' => '2012-03-20 12:00:00'
		),
		array(
			'id' => 4,
			'title' => 'Fukuoka.php Vol.1 参加報告',
			'body' => 'Fukuoka.php Vol.1に行ってきました。',
			'author_id' => 2,
			'created' => '2012-05-25 12:00:00',
			'modified' => '2012-05-25 12:00:00'
		),
		array(
			'id' => 5,
			'title' => 'お久しぶりです！',
			'body' => '半年ぶりの更新となりました。心を入れ替え、頑張ってブログを書いていきたいです。',
			'author_id' => 1,
			'created' => '2012-06-01 12:00:00',
			'modified' => '2012-06-01 12:00:00'
		),
		array(
			'id' => 6,
			'title' => 'CentOS開発環境の構築',
			'body' => 'VMware FusionにCentOS6.2 Minimalをインストールし、開発環境（Apache, MySQL, PHP）を構築したときのメモ。',
			'author_id' => 3,
			'created' => '2012-06-19 12:00:00',
			'modified' => '2012-06-19 12:00:00'
		),
		array(
			'id' => 7,
			'title' => 'Fukuoka.php Vol.2 で発表してきました',
			'body' => 'Fukuoka.php Vol.2に参加&発表してきました。',
			'author_id' => 2,
			'created' => '2012-07-25 12:00:00',
			'modified' => '2012-07-25 12:00:00'
		),
		array(
			'id' => 8,
			'title' => 'NetBeansでFuelPHPのユニットテストを実行する方法',
			'body' => 'NetBeansからFuelPHPのユニットテスト（PHPUnit）を実行するための設定方法をメモしておきます。',
			'author_id' => 2,
			'created' => '2012-08-07 12:00:00',
			'modified' => '2012-08-07 12:00:00'
		),
		array(
			'id' => 9,
			'title' => 'Node.jsとWebSocket.IOでチャットアプリを作る',
			'body' => 'Node.jsとWebSocket.IOでチャットアプリを作ってみました。',
			'author_id' => 2,
			'created' => '2012-10-22 12:00:00',
			'modified' => '2012-10-22 12:00:00'
		),
		array(
			'id' => 10,
			'title' => 'PHPMatsuri 2012に参加してきた',
			'body' => '2012年11月3日（土）10時〜11月4日（日）16時という日程で、福岡で開催された “PHP Matsuri 2012” に参加してきました。',
			'author_id' => 2,
			'created' => '2012-11-05 12:00:00',
			'modified' => '2012-11-05 12:00:00'
		),
	);

}
