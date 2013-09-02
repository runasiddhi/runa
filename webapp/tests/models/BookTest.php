<?php
class BookTest extends CIUnit_Testcase{

	protected $tables=array(
		'books'=>'books'
		);

	public function __construct()
	{
		parent::__construct();
	}

	public function setUp() {
		parent::setUp();
	}

	public function tearDown() {
		parent::tearDown();

	}

	public function test_set_book_name(){
		$book=new Book();
		$book->book_name='PHP';
		$this->assertEquals($book->book_name,'PHP');
	}

	public function test_book_name_blank(){
		$book=new Book();
		$this->setExpectedException('BlankBookException');
		$book->book_name='';
	}

	public function test_set_author(){
		$book=new Book();
		$book->author='Julia';
		$this->assertEquals($book->author,'Julia');
	}

	public function test_author_blank(){
		$book=new Book();
		$this->setExpectedException('BlankAuthorException');
		$book->author='';
	}

	public function test_create(){
		$book=Book::create(
			array(
				'book_name'=>'Oracle',
				'author'=>'Henry'
				)
			);

		// $this->assertEquals($book->id,3);
		$this->assertEquals($book->book_name,'Oracle');
		$this->assertEquals($book->author,'Henry');
	}
}