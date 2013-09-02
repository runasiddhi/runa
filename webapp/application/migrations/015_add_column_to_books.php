<?php
class Migration_Add_column_to_books extends CI_Migration{
	public function up(){
		$param=array(
			'is_active'=>array(
				'type'=>'bool',
				),
			'is_deleted'=>array(
				'type'=>'bool'
				)
			);

		$this->dbforge->add_column('books',$param);
	}

	public function down(){
		$this->dbforge->drop_column('books','is_active');
		$this->dbforge->drop_column('books','is_deleted');
	}
}