<?php
include_once('Exception.php');

class Organization extends BaseModel{
	static $table_name='organizations';
	static $primary_key='id';

	static $has_many=array(
		array(
			'org_members',
			'class_name'=>'Member',
			'foreign_key'=>'org_id'
			),

		array(
			'org_books',
			'class_name'=>'Organization_book',
			'foreign_key'=>'org_id',
			)
		);

	public static function create($data){
		$org=new Organization();

		$org->name=$data['name'];
		$org->address=$data['address'];
		$org->contact_number=$data['contact_number'];
		$org->email=$data['email'];

		$org->save();

		$org->activate();

		return $org;
	}

	/**Getter and Setter**/
	public function set_name($name){
		if($name==''){
			throw new NameBlankException('Name can\'t be null');
		}
		$this->assign_attribute('name',$name);
	}

	public function get_name(){
		return $this->read_attribute('name');
	}

	public function set_address($address){
		if($address==''){
			throw new AddressBlankException('Address can\'t be null');
		}
		$this->assign_attribute('address',$address);
	}

	public function get_address(){
		return $this->read_attribute('address');
	}

	public function set_contact_number($contact_number){
		if($contact_number==''){
			throw new OrgContactNumberBlankException('Contact number can\'t be null');
		}
		$this->assign_attribute('contact_number',$contact_number);
	}

	public function get_contact_number(){
		return $this->read_attribute('contact_number');
	}

	public function set_email($email){
		if($email==''){
			throw new OrgEmailBlankException('Email can\'t be null');
		}
		$this->assign_attribute('email',$email);
	}

	public function get_email(){
		return $this->read_attribute('email');
	}
}