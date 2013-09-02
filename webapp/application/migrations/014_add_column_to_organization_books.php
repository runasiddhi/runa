<?php
class Migration_Add_column_to_organization_books extends CI_Migration{
	public function up(){
		$param=array(
			'is_active'=>array(
				'type'=>'bool',
				),
			'is_deleted'=>array(
				'type'=>'bool'
				)
			);

		$this->dbforge->add_column('organization_books',$param);
	}

	public function down(){
		$this->dbforge->drop_column('organization_books','is_active');
		$this->dbforge->drop_column('organization_books','is_deleted');
	}
}