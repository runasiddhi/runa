<?php
class Migration_Add_column_to_member_books extends CI_Migration{
	public function up(){
		$param=array(
		'is_deleted'=>array(
			'type'=>'bool'
			)
		);

		$this->dbforge->add_column('member_books',$param);
	}

	public function down(){
		$this->dbforge->drop_column('member_books','is_deleted');
	}
	
}