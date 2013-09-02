<?php
class Migration_Add_column_to_organizations extends CI_Migration{
	public function up(){
		$param=array(
			'is_active'=>array(
				'type'=>'bool',
				),
			'is_deleted'=>array(
				'type'=>'bool'
				)
			);

		$this->dbforge->add_column('organizations',$param);
	}

	public function down(){
		$this->dbforge->drop_column('organizations','is_active');
		$this->dbforge->drop_column('organizations','is_deleted');
	}
}