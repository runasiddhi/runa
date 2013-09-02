<?php
class MemberTest extends CIUnit_TestCase{

	protected $tables=array(
		'members'=>'members',
		'users'=>'users',
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

	public function test_set_first_name(){
		$member=new Member();
		$member->first_name='runa';
		$this->assertEquals($member->first_name,'runa');
	}

	public function test_first_name_blank(){
		$member=new Member();
		$this->setExpectedException('FirstNameBlankException');
		$member->first_name='';
	}

	public function test_set_last_name(){
		$member=new Member();
		$member->last_name='bajracharya';
		$this->assertEquals($member->last_name,'bajracharya');
	}

	public function test_last_name_blank(){
		$member=new Member();
		$this->setExpectedException('LastNameBlankException');
		$member->last_name='';
	}

	public function test_set_email(){
		$member=new Member();
		$member->email='runa@gmail.com';
		$this->assertEquals($member->email,'runa@gmail.com');
	}

	public function test_email_blank(){
		$member=new Member();
		$this->setExpectedException('EmailBlankException');
		$member->email='';
	}

	public function test_set_contact_number(){
		$member=new Member();
		$member->contact_number='9841034638';
		$this->assertEquals($member->contact_number,'9841034638');
	}

	public function test_contact_number_blank(){
		$member=new Member();
		$this->setExpectedException('ContactNumberBlankException');
		$member->contact_number='';
	}

	public function test_set_sex(){
		$member=new Member();
		$member->sex='female';
		$this->assertEquals($member->sex,'female');
	}

	public function test_sex_blank(){
		$member=new Member();
		$this->setExpectedException('SexBlankException');
		$member->sex='';
	}

	public function test_set_organization(){
		$member=new Member();
		$organization=Organization::find_by_id($this->organizations_fixt[1]['id']);
		$member->organization=$organization;
		$this->assertEquals($member->org_id,$organization->id);
	}

	public function test_inactive_organization(){
		$organization=Organization::find_by_id($this->organizations_fixt[1]['id']);
		$organization->deactivate();		

		$member=new Member();
		$this->setExpectedException('InactiveException');
		$member->organization=$organization;
	}

	public function test_deleted_organization(){
		$organization=Organization::find_by_id($this->organizations_fixt[1]['id']);
		$organization->delete();		

		$member=new Member();
		$this->setExpectedException('DeletedException');
		$member->organization=$organization;
	}

	public function test_set_book_count(){
		$member=new Member();
		$member->book_count=2;
		$this->assertEquals($member->book_count,2);
	}

	public function test_invalid_book_count(){
		$member=new Member();
		$this->setExpectedException('InvalidBookCountException');
		$member->book_count=-1;
	}

	public function test_create(){
		$organization=Organization::find_by_id($this->organizations_fixt[1]['id']);

		$member=Member::create(
			array(
				'first_name'=>'RunaSiddhi',
				'last_name'=>'Bajracharya',
				'email'=>'runa@gmail.com',
				'contact_number'=>'9841034638',
				'sex'=>'female',
				'organization'=>$organization
				)
			);

		$this->assertEquals($member->first_name,'RunaSiddhi');
		$this->assertEquals($member->last_name,'Bajracharya');
		$this->assertEquals($member->email,'runa@gmail.com');
		$this->assertEquals($member->contact_number,'9841034638');
		$this->assertEquals($member->sex,'female');
		$this->assertEquals($member->org_id,$organization->id);
	}

	public function test_increase_book_count(){
		$member=new Member();
		$member->book_count=0;
		$member->increase_book_count();

		$this->assertEquals($member->book_count,1);
	}

	public function test_decrease_book_count(){
		$member=new Member();
		$member->book_count=1;
		$member->decrease_book_count();

		$this->assertEquals($member->book_count,0);
	}

	public function test_null_revoke(){
		$member=new Member();
		$member->book_count=0;

		$this->setExpectedException('InvalidBookCountException');
		$member->decrease_book_count();
	}

	public function test_full_issue_book(){
		$member=new Member();
		$member->book_count=5;

		$this->setExpectedException('FullIssueBookException');
		
		$member->increase_book_count();
	}
}