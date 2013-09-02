<?php
class MemberBookTest extends CIUnit_Testcase{

	protected $tables=array(
		'organization_books'=>'organization_books',
		'member_books'=>'member_books',
		'members'=>'members',
		'organizations'=>'organizations'
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


	public function test_set_org_book(){		
		$organization_book=Organization_book::find_by_id($this->organization_books_fixt[1]['id']);

		$member_book=new Member_book();
		$member_book->organization_book=$organization_book;

		$this->assertEquals($member_book->org_book_id,$organization_book->id);		
	}

	public function test_inactive_org_book(){
		$organization_book=Organization_book::find_by_id($this->organization_books_fixt[1]['id']);
		$organization_book->deactivate();

		$this->setExpectedException('InactiveException');

		$member_book=new Member_book();
		$member_book->organization_book=$organization_book;
	}

	public function test_deleted_org_book(){
		$organization_book=Organization_book::find_by_id($this->organization_books_fixt[1]['id']);
		$organization_book->delete();

		$this->setExpectedException('DeletedException');
		
		$member_book=new Member_book();
		$member_book->organization_book=$organization_book;
	}

	public function test_set_member(){
		$member=Member::find_by_id($this->members_fixt[1]['id']);

		$member_book=new Member_book();
		$member_book->member=$member;

		$this->assertEquals($member_book->member_id,$member->id);
	}

	public function test_inactive_member(){
		$member=Member::find_by_id($this->members_fixt[1]['id']);
		$member->deactivate();

		$this->setExpectedException('InactiveException');

		$member_book=new Member_book();
		$member_book->member=$member;
	}

	public function test_deleted_member(){
		$member=Member::find_by_id($this->members_fixt[1]['id']);
		$member->delete();

		$this->setExpectedException('DeletedException');

		$member_book=new Member_book();
		$member_book->member=$member;
	}

	public function test_create(){
		$organization_book=Organization_book::find_by_id($this->organization_books_fixt[1]['id']);
		$member=Member::find_by_id($this->members_fixt[1]['id']);

		$member_book=Member_book::create(array('org_book'=>$organization_book,'member'=>$member));

		// $this->assertEquals($member_book->id,2);
		$this->assertEquals($member_book->org_book_id,$organization_book->id);
		$this->assertEquals($member_book->member_id,$member->id);
	}

	public function test_invalid_issue_book(){
		$organization_book=Organization_book::find_by_id($this->organization_books_fixt[2]['id']);
		$member=Member::find_by_id($this->members_fixt[1]['id']);

		$this->setExpectedException('InvalidBookIssueException');
		$member_book=Member_book::create(array('org_book'=>$organization_book,'member'=>$member));	
	}

	public function test_already_issued(){
		$organization_book=Organization_book::find_by_id($this->organization_books_fixt[1]['id']);
		$member=Member::find_by_id($this->members_fixt[1]['id']);

		$member_book=Member_book::create(array('org_book'=>$organization_book,'member'=>$member));

		$this->setExpectedException('AlreadyIssuedException');

		$member_book=Member_book::create(array('org_book'=>$organization_book,'member'=>$member));
	}


}