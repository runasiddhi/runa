<?php
class OrganizationBookTest extends CIUnit_Testcase{

	protected $tables=array(
		'organizations'=>'organizations',
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

	public function test_set_organization(){
		$organization=Organization::find_by_id($this->organizations_fixt[1]['id']);
		$org_book=new Organization_book();
		$org_book->organization=$organization;

		$this->assertEquals($org_book->org_id,$organization->id);
	}

	public function test_inactive_organization(){
		$organization=Organization::find_by_id($this->organizations_fixt[1]['id']);
		$organization->deactivate();

		$this->setExpectedException('InactiveException');
		$org_book=new Organization_book();
		$org_book->organization=$organization;
	}

	public function test_deleted_organization(){
		$organization=Organization::find_by_id($this->organizations_fixt[1]['id']);
		$organization->delete();

		$this->setExpectedException('DeletedException');
		$org_book=new Organization_book();
		$org_book->organization=$organization;
	}

	public function test_set_book(){
		$book=Book::find_by_id($this->books_fixt[1]['id']);

		$org_book=new Organization_book();
		$org_book->book=$book;

		$this->assertEquals($org_book->book_id,$book->id);
	}

	public function test_inactive_book(){
		$book=Book::find_by_id($this->books_fixt[1]['id']);
		$book->deactivate();

		$this->setExpectedException('InactiveException');
		$org_book=new Organization_book();
		$org_book->book=$book;
	}

	public function test_deleted_book(){
		$book=Book::find_by_id($this->books_fixt[1]['id']);
		$book->delete();

		$this->setExpectedException('DeletedException');
		$org_book=new Organization_book();
		$org_book->book=$book;
	}

	public function test_set_quantity(){
		$org_book=new Organization_book();
		$org_book->quantity=20;

		$this->assertEquals($org_book->quantity,20);
	}

	public function test_invalid_quantity(){
		$org_book=new Organization_book();

		$this->setExpectedException('InvalidQuantityException');
		$org_book->quantity=-1;
	}

	public function test_create(){
		$organization=Organization::find_by_id($this->organizations_fixt[1]['id']);
		$book=Book::find_by_id($this->books_fixt[1]['id']);

		$org_book=Organization_book::create(array('organization'=>$organization,'book'=>$book,'quantity'=>20));

		$this->assertEquals($org_book->org_id,$organization->id);
		$this->assertEquals($org_book->book_id,$book->id);
		// $this->assertEquals($org_book->id,2);
		$this->assertEquals($org_book->quantity,20);
	}

	public function test_increase_quantity(){
		$organization=Organization::find_by_id($this->organizations_fixt[1]['id']);
		$book=Book::find_by_id($this->books_fixt[1]['id']);

		$org_book=Organization_book::create(array('organization'=>$organization,'book'=>$book,'quantity'=>20));
		$org_book->increase_quantity(1);

		$this->assertEquals($org_book->quantity,21);
	}

	public function test_issue(){
		$organization=Organization::find_by_id($this->organizations_fixt[1]['id']);
		$book=Book::find_by_id($this->books_fixt[1]['id']);

		$org_book=Organization_book::create(array('organization'=>$organization,'book'=>$book,'quantity'=>20));

		$org_book->issue();

		$this->assertEquals($org_book->quantity,19);
	}

	public function test_revoke(){
		$organization=Organization::find_by_id($this->organizations_fixt[1]['id']);
		$book=Book::find_by_id($this->books_fixt[1]['id']);

		$org_book=Organization_book::create(array('organization'=>$organization,'book'=>$book,'quantity'=>20));

		$org_book->revoke();

		$this->assertEquals($org_book->quantity,21);
	}

	public function test_book_not_available(){
		$organization=Organization::find_by_id($this->organizations_fixt[1]['id']);
		$book=Book::find_by_id($this->books_fixt[1]['id']);

		$org_book=Organization_book::create(array('organization'=>$organization,'book'=>$book,'quantity'=>0));

		$this->setExpectedException('BookNotAvailableException');
		$org_book->issue();
	}
}