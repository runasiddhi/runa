<?php
class Migration_Add_column_to_members extends CI_Migration{
	public function up(){
		$param=array(
			'book_count'=>array(
				'type'=>'int',
				'constraint'=>5
				)
			);

		$this->dbforge->add_column('members',$param);
	}

	public function down(){
		$this->dbforge->drop_column('members','book_count');
	}
}