<?php
class Migration_Modify_table_members extends CI_Migration{
	public function up(){
		$paroms=array(
			'is_active'=>array(
				'type'=>'bool'
				),
			'is_deleted'=>array(
				'type'=>'bool'
				)
			);

		$this->dbforge->add_column('members',$paroms);

	}

	public function down(){
		$this->dbforge->drop_column('members','is_active');
		$this->dbforge->drop_column('members','is_deleted');
	}
}