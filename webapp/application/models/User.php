<?php
include_once('Exception.php');

class User extends BaseModel{
	
	static $table_name='users';
	static $primary_key='id';

	static $belongs_to=array(
	        array(
	        'member',
	        'class_name'=> 'Member',
	        'foreign_key'=>'member_id',
	        )
	    );

	public static function create($data){
		$user=new User();

		$user->username = array_key_exists('username', $data) ? $data['username'] : null;
		$user->password = array_key_exists('password', $data) ? $data['password'] : null;

		if($data['password']!=$data['confirm_password']){
			throw new PasswordMismatchException('Password did not match');
		}

		$user->save();
		return $user;
	}

	public static function check_login($username,$password){
		$user = User::find_by_username($username);		

		if(!$user)
        {
            throw new UserInvalidException("Invalid Username!");
        } 

        // $user->member->check_is_not_valid();
        
        $password=sha1($password);

        if($user->password!=$password)
        {
        	throw new UserPasswordInvalidException("Invalid Password!");
        }
        
        Member::find_valid_by_id($user->member->id);

        $user->member->organization->check_is_not_valid();

        return $user; 

	}

	/*Getter and Setter*/

	public function set_username($username){
		if($username==''){
			throw new UsernameBlankException('Username cant be blank');
		}

		$user = User::find(array('conditions'=>array('username=?',$username)));
        if($user){
            throw new UserExistsException('Username already exists');
        }		

		$this->assign_attribute('username',$username);
	}	

	public function get_username(){
		return $this->read_attribute('username');
	}

	public function set_password($password){
		if($password==''){
			throw new PasswordBlankException('Password cant be blank');
		}

		$this->assign_attribute('password',sha1($password));
	}

	public function get_password(){
		return $this->read_attribute('password');
	}

	public function set_member($member){
		$member->check_is_not_valid();

		$this->assign_attribute('member_id',$member->id);
	}

	public function get_member() {
		$id = $this->read_attribute('member_id');
		$member = Member::find_by_id($id);
		return $member;
	}
}