<?php
class Migration_Add_column_to_users extends CI_Migration{
	public function up(){
		$paroms=array(
			'member_id'=>array(
				'type'=>'int',
				'constaint'=>5
				)
			);

		$this->dbforge->add_column('users',$paroms);
	}

	public function down(){
		$this->dbforge->drop_column('users','member_id');
	}

}