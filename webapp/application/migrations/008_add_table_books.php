<?php
class Migration_Add_table_books extends CI_Migration{
	public function up(){
		$param=array(
			'id'=>array(
				'type'=>'int',
				'constraint'=>5,
				'auto_increment'=>true
				),
			'book_name'=>array(
				'type'=>'varchar',
				'constraint'=>256,
				),
			'author'=>array(
				'type'=>'varchar',
				'constraint'=>256
				)
			);

		$this->dbforge->add_field($param);
		$this->dbforge->add_key('id',true);
		$this->dbforge->create_table('books');

	}

	public function down(){
		$this->dbforge->drop_table('books');
	}
}