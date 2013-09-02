<?php
class Migration_Add_table_member_books extends CI_Migration{
	public function up(){
		$param=array(
			'id'=>array(
				'type'=>'int',
				'constraint'=>5,
				'auto_increment'=>true
				),
			'member_id'=>array(
				'type'=>'int',
				'constraint'=>5
				),
			'org_book_id'=>array(
				'type'=>'int',
				'constraint'=>5
				)
			);
		$this->dbforge->add_field($param);
		$this->dbforge->add_key('id',true);
		$this->dbforge->create_table('member_books');
	}

	public function down(){
		$this->dbforge->drop_table('member_books');
	}
}