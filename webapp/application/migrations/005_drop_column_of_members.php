<?php
class Migration_Drop_column_of_members extends CI_Migration{
	public function up(){
		$this->dbforge->drop_column('members','username');
		$this->dbforge->drop_column('members','password');
	}

	public function down(){
		$param=array(
			'username' =>array(
				'type' =>'varchar' ,
				'constraint'=>256 
				),
			'password' =>array(
				'type'=>'varchar',
				'constraint'=>256
				)
			);
		$this->dbforge->add_column('members',$param);
	}
}