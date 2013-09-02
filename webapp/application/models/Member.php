<?php

include_once('Exception.php');

class Member extends BaseModel{
    
    static $table_name = 'members';
    static $primary_key = 'id';

    static $has_one=array(
            array(
            'user',
            'class_name'=> 'User',
            'foreign_key'=>'member_id',
            )
        );

    static $belongs_to=array(
            array(
            'organization',
            'class_name'=> 'Organization',
            'foreign_key'=>'org_id',
            )
        );

    static $has_many=array(
        array(
            'member_books',
            'class_name'=>'Member_book',
            'foreign_key'=>'member_id'
            )
        );
    
    public static function create($data){

        $member=new Member();
        
        $member->first_name = $data['first_name'];
        $member->last_name=$data['last_name'];
        $member->email=$data['email'];
        $member->contact_number=$data['contact_number'];
        $member->sex=$data['sex'];
        $member->organization=$data['organization'];
        $member->activate();

        return $member;        
    }

    public function increase_book_count(){
        $this->book_count = $this->book_count + 1;
    }

    public function decrease_book_count(){
        $this->book_count = $this->book_count - 1;
    }

    /*****Getter and Setter*****/
    public function set_first_name($first_name){
        if($first_name == '') {

            throw new FirstNameBlankException('First name cant be blank');
        }
        $this->assign_attribute('first_name',$first_name);
    }
    
    public function get_first_name(){
        return $this->read_attribute('first_name');
    }
    
    public function set_last_name($last_name){
        if($last_name == ''){
            throw new LastNameBlankException('Last name can\'t be blank');
        }
        $this->assign_attribute('last_name',$last_name);
    }
    
    public function get_last_name(){
       return $this->read_attribute('last_name');
    } 
    
    public function set_email($email){
        if($email == ''){
            throw new EmailBlankException('Email is required');
        }
        $this->assign_attribute('email',$email);
    }
    
    public function get_email(){
        return $this->read_attribute('email');
    } 
    
    public function set_contact_number($contact_number){
        if($contact_number == ''){
            throw new ContactNumberBlankException('Contact Number is required');
        }
        $this->assign_attribute('contact_number',$contact_number);
    }
    
    public function get_contact_number(){
        return $this->read_attribute('contact_number');
    } 
    
    public function set_sex($sex){
        if($sex==''){
            throw new SexBlankException('Select any one');
        }
        $this->assign_attribute('sex',$sex);
    }
    
    public function get_sex(){
        return $this->read_attribute('sex');
    }  

    public function set_organization($organization){
        $organization->check_is_not_valid();

        $this->assign_attribute('org_id',$organization->id);
    }

    public function set_book_count($book_count){
        if($book_count>5){
            throw new FullIssueBookException('You have already issued five books!!');
        }
        if($book_count<0){
            throw new InvalidBookCountException('You have no book to return!!');
        }
        $this->assign_attribute('book_count',$book_count);
    }

    public function get_book_count(){
        return $this->read_attribute('book_count');
    }
}

