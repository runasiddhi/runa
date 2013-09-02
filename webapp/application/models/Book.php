<?php

include_once('Exception.php');

class Book extends BaseModel{

	static $table_name="books";
	static $primary_key="id";

	static $has_many=array(
		array(
			'org_books',
			'class_name'=>'Organization_book',
			'foreign_key'=>'book_id'
			)
		);

	public static function create($data){
		$book=new Book();

		$book->book_name=$data['book_name'];
		$book->author=$data['author'];

		$book->save();
		$book->activate();

		return $book;
	}

	public function set_book_name($book_name){
		if($book_name==''){
			throw new BlankBookException('Book name is required');
		}
		$this->assign_attribute('book_name',$book_name);
	}

	public function get_book_name(){
		return $this->read_attribute('book_name');
	}

	public function set_author($author){
		if($author==''){
			throw new BlankAuthorException('Author name is required');
		}
		$this->assign_attribute('author',$author);
	}

	public function get_author(){
		return $this->read_attribute('author');
	}
}