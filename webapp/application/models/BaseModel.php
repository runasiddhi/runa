<?php

include_once('Exception.php');

class BaseModel extends ActiveRecord\Model{

	public function activate(){
		$this->is_active=1;
		$this->save();
	}

	public function deactivate(){
		$this->is_active=0;
		$this->save();
	}

	public function delete(){
		$this->is_active=0;
		$this->is_deleted=1;
		$this->save();
	}

	public function undelete(){
		$this->is_active=1;
		$this->is_deleted=0;
		$this->save();
	}

	public function check_inactive(){
		if($this->is_active==false){
			throw new InactiveException('The model is inactive');
		}
	}

	public function check_deleted(){
		if($this->is_deleted==true){
			throw new DeletedException('The model is deleted');
		}
	}

	public function check_is_not_valid(){
		$this->check_deleted();
		$this->check_inactive();
	}

	public static function __callstatic($method,$args){

		if (substr($method,0,17) == 'find_undeleted_by'){

			$method='find_by'.substr($method,17);
			$model=parent::__callstatic($method,$args);

			if(!$model->is_deleted){				
				return $model;
			}

			return;

		}
		if (substr($method,0,21) == 'find_all_undeleted_by'){

			$method='find_all_by'.substr($method,21).'_and_is_deleted';

			$args_count=count($args);
			$args[$args_count]=0;		

			$models=parent::__callstatic($method,$args);

			return $models;

			// $models=parent::__callstatic($method,$args);
			// foreach ($models as $model) {
			// 	if(!$model->is_deleted) {

			// 		$records[]=$model;
			// 	}
			// }
			// return $records;				
		}
		if (substr($method,0,13) == 'find_valid_by'){

			$method='find_by'.substr($method,13);
			$model=parent::__callstatic($method,$args);

			$model->check_is_not_valid();

			return $model;
		}
		if (substr($method,0,17) == 'find_all_valid_by'){

			$method='find_all_by'.substr($method,17).'_and_is_deleted_and_is_active';

			$args_count=count($args);
			$args[$args_count]=0;
			$args[$args_count + 1]=1;

			$models=parent::__callstatic($method,$args);	

			return $models;		
			
			// foreach ($models as $model) {
			// 	if(!$model->is_deleted){
			// 		if($model->is_active){
			// 			$records[]=$model;
			// 		}
			// 	}
			// }

			// return $records;			
		}

		$model=parent::__callstatic($method,$args);
		return $model;
	}
}