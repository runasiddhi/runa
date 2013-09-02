<?php
class Migration_Add_table_users extends CI_Migration{
	public function up(){
		$paroms=array(
			'id'=>array(
				'type'=>'int',
				'constraint'=>5,
				'auto_increment'=>true
				),
			'username'=>array(
				'type'=>'varchar',
				'constraint'=>256
				),
			'password'=>array(
				'type'=>'varchar',
				'constraint'=>256
				)
			);

		$this->dbforge->add_field($paroms);
		$this->dbforge->add_key('id');
		$this->dbforge->create_table('users');
	}

	public function down(){
		$this->dbforge->drop_table('users');
	}
}