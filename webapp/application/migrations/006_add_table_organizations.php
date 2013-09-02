<?php
class Migration_Add_table_organizations extends CI_Migration{
	public function up(){
		$param=array(
			'id'=>array(
				'type'=>'int',
				'constraint'=>5,
				'auto_increment'=>true
				),
			'name'=>array(
				'type'=>'varchar',
				'constraint'=>256
				),
			'address'=>array(
				'type' =>'varchar',
				'constraint'=>256
				 ),
			'contact_number'=>array(
				'type'=>'varchar',
				'constraint'=>10
				),
			'email'=>array(
				'type'=>'varchar',
				'constraint'=>256
				)
			);

		$this->dbforge->add_field($param);
		$this->dbforge->add_key('id',true);
		$this->dbforge->create_table('organizations');
	}

	public function down(){
		$this->dbforge->drop_table('organizations');
	}
}