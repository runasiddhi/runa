<?php

include_once('Exception.php');

class Member_book extends BaseModel{
	
	static $table_name='member_books';
	static $primary_key='id';
	
	static $belongs_to=array(
		array(
			'member',
			'class_name'=>'Member',
			'foreign_key'=>'member_id'
			),
		array(
			'organization_book',
			'class_name'=>'Organization_book',
			'foreign_key'=>'org_book_id'
			)
		);
	
	public static function create($data){
		$member_book=new Member_book();

		$member_book->member=$data['member'];			

		$member_book->organization_book=$data['org_book'];

		if($member_book->member->org_id != $member_book->organization_book->org_id){
			throw new InvalidBookIssueException('The issued book is invalid');
		}
		
		$member_book->member->increase_book_count();
		$member_book->organization_book->issue();

		$member_book->member->save();
		$member_book->save();

		return $member_book;
	}

	public function revoke(){
		$this->organization_book->revoke();	
		$this->member->decrease_book_count();
		$this->member->save();
		$this->delete();
	}

	public function set_member($member){
		$member->check_is_not_valid();
		$this->assign_attribute('member_id',$member->id);
	}

	public function set_organization_book($org_book){
		$org_book->check_is_not_valid();
		
		$member_book=Member_book::find(array('conditions'=>array('member_id=? and org_book_id=? and is_deleted!=1',$this->member_id,$org_book->id)));
		if($member_book){
			throw new AlreadyIssuedException('You have already issued this book!!');
		}

		$this->assign_attribute('org_book_id',$org_book->id);
	}
}