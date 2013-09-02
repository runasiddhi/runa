<?php
class Migration_Add_table_members extends CI_Migration{
	public function up(){
		$paroms=array(
			'id'=>array(
				'type'=>'int',
				'constraint'=>'5',
				'auto_increment'=>true
				),
			'first_name'=>array(
				'type'=>'varchar',
				'constraint'=>256
				),
			'last_name'=>array(
				'type'=>'varchar',
				'constraint'=>256
				),
			'email'=>array(
				'type'=>'varchar',
				'constraint'=>256
				),
			'contact_number'=>array(
				'type'=>'varchar',
				'constraint'=>10
				),
			'sex'=>array(
				'type'=>'varchar',
				'constraint'=>10
				),
			'username'=>array(
				'type'=>'varchar',
				'constraint'=>256
				),
			'password'=>array(
				'type'=>'varchar',
				'constraint'=>'256'
				)
			);

		$this->dbforge->add_field($paroms);
		$this->dbforge->add_key('id',true);
		$this->dbforge->create_table('members');
	}

	public function down(){
		$this->dbforge->drop_table('members');
	}
}