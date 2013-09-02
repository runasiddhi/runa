<?php
class Migration_Add_table_organization_books extends CI_Migration{
	public function up(){
		$param=array(
			'id'=>array(
				'type'=>'int',
				'constraint'=>5,
				'auto_increment'=>true
				),
			'org_id'=>array(
				'type'=>'int',
				'constraint'=>5
				),
			'book_id'=>array(
				'type'=>'int',
				'constraint'=>5
				),
			'quantity'=>array(
				'type'=>'int',
				'constraint'=>5
				)
			);

		$this->dbforge->add_field($param);
		$this->dbforge->add_key('id');
		$this->dbforge->create_table('organization_books');
	}

	public function down(){
		$this->dbforge->drop_table('organization_books');
	}
}