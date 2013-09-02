<?php
class OrganizationTest extends CIUnit_Testcase{

	protected $tables=array('organizations'=>'organizations');

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

	public function test_set_name(){
		$organization=new Organization();
		$organization->name='Olive';
		$this->assertEquals($organization->name,'Olive');
	}

	public function test_name_blank(){
		$organization=new Organization();
		$this->setExpectedException('NameBlankException');
		$organization->name='';
		
	}

	public function test_set_address(){
		$organization=new Organization();
		$organization->address='Mitrapark';
		$this->assertEquals($organization->address,'Mitrapark');
	}

	public function test_address_blank(){
		$organization=new Organization();
		$this->setExpectedException('AddressBlankException');
		$organization->address='';
	}

	public function test_set_contact_number(){
		$organization=new Organization();
		$organization->contact_number='014227894';
		$this->assertEquals($organization->contact_number,'014227894');
	}

	public function test_contact_number_blank(){
		$organization=new Organization();
		$this->setExpectedException('OrgContactNumberBlankException');
		$organization->contact_number='';
	}

	public function test_set_email(){
		$organization=new Organization();
		$organization->email='info@olive.co';
		$this->assertEquals($organization->email,'info@olive.co');
	}

	public function test_email_blank(){
		$organization=new Organization();
		$this->setExpectedException('OrgEmailBlankException');
		$organization->email='';
	}

	public function test_create(){
		$organization=Organization::create(
			array(
				'name'=>'Olive',
				'address'=>'Mitrapark',
				'contact_number'=>'0142225697',
				'email'=>'info@olive.co'
				)
			);

		// $this->assertEquals($organization->id,2);
		$this->assertEquals($organization->name,'Olive');
		$this->assertEquals($organization->address,'Mitrapark');
		$this->assertEquals($organization->contact_number,'0142225697');
		$this->assertEquals($organization->email,'info@olive.co');
	}
}