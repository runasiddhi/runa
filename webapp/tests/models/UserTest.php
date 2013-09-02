<?php
class UserTest extends CIUnit_TestCase{

	protected $tables=array(
		'users'=>'users',
		'members'=>'members'
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
	
	public function test_set_username(){
		$user=new User();
		$user->username='runa1';
		$this->assertEquals($user->username,'runa1');
	}

	public function test_username_blank(){
		$user=new User();		
		$this->setExpectedException('UsernameBlankException');
		$user->username='';
	}

	public function test_user_exits(){
		$user=User::find_by_id($this->users_fixt[1]['id']);

		$this->setExpectedException('UserExistsException');
		$user=$this->create_user();
	}

	public function test_set_password(){
		$user=new User();
		$user->password='runa1';
		$this->assertEquals($user->password,sha1('runa1'));
	}

	public function test_passord_blank(){
		$user=new User();
		$this->setExpectedException('PasswordBlankException');
		$user->password='';
	}

	public function test_password_mismatch(){
		$member=Member::find_by_id($this->members_fixt[1]['id']);

		$this->setExpectedException('PasswordMismatchException');

		$user=User::create(array(
			'username'=>'runa1',
			'password'=>'runa12',
			'confirm_password'=>'runa1',
			'member'=>$member
			));		
	}

	public function test_member(){
		$member=Member::find_by_id($this->members_fixt[1]['id']);

		$user=new User();
		$user->member=$member;
		$this->assertEquals($user->member_id,$member->id);

	}

	public function test_inactive_member(){
		$member=Member::find_by_id($this->members_fixt[1]['id']);
		$member->deactivate();

		$user=new User();
		$this->setExpectedException('InactiveException');
		$user->member=$member;
	}

	public function test_deleted_member(){
		$member=Member::find_by_id($this->members_fixt[1]['id']);
		$member->delete();

		$user=new User();
		$this->setExpectedException('DeletedException');
		$user->member=$member;
	}

	public function test_create(){

		$member=Member::find_by_id($this->members_fixt[1]['id']);

		$user=User::create(array(
			'username'=>'runa1',
			'password'=>'runa1',
			'confirm_password'=>'runa1'
			));

		$user->member=$member;

		$this->assertEquals($user->username,'runa1');
		$this->assertEquals($user->password,sha1('runa1'));
		$this->assertEquals($user->member_id,$member->id);
	}
}