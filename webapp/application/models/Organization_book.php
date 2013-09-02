<?php
include_once('Exception.php');

class Organization_book extends BaseModel{
	
	static $table_name='organization_books';
	static $primary_key='id';
	
	static $belongs_to=array(
			array(
				'organization',
				'class_name'=>'Organization',
				'foreign_key'=>'org_id'
				),
			array( 
				'book',
				'class_name'=>'Book',
				'foreign_key'=>'book_id'
				)
		);

	static $has_many=array(
		array(
			'member_books',
			'class_name'=>'Member_book',
			'foreign_key'=>'org_book_id'
			)
		);

	public static function create($data){
		$org_book=new Organization_book();

		$org_book->organization=$data['organization'];
		$org_book->book=$data['book'];
		$org_book->quantity=$data['quantity'];

		$org_book->save();

		$org_book->activate();

		return $org_book;
	}

	public function issue(){		
		if($this->quantity==0){
			throw new BookNotAvailableException('This book is finished');
		}   
		$this->quantity = $this->quantity - 1;
		$this->save();
	}

	public function revoke(){
		$this->quantity=$this->quantity+1;
		$this->save();
	}

	public function increase_quantity($quantity){
		$this->quantity=$this->quantity+$quantity;
		$this->save();
	}

	/***Getter and Setter***/
	public function set_organization($organization){
		$organization->check_is_not_valid();

		$this->assign_attribute('org_id',$organization->id);
	}

	public function set_book($book){
		$book->check_is_not_valid();

		$this->assign_attribute('book_id',$book->id);
	}	

	public function set_quantity($quantity){ 
		if($quantity<0){
			throw new InvalidQuantityException('Invalid Quantity');
		}
		$this->assign_attribute('quantity',$quantity);
	}

	public function get_quantity(){
		return $this->read_attribute('quantity');
	}
}