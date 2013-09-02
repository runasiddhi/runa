<?php

class Dashboard extends SessionController{

	public function __construct(){
		parent::__construct();
	}

	public function index(){		
		$member_id=$this->session->userdata('member_id');
		$member=Member::find_by_id($member_id);
		return $this->load->view('welcome',array('member_item'=>$member));	
	}

	public function issue_book(){
		if(!$_POST){
			$member_id=$this->session->userdata('member_id');

			$member=Member::find_by_id($member_id);
			// $org_books=Organization_book::find('all',array('conditions'=>array('org_id'=>$member->organization->id)));
			$org_books=Organization_book::find_all_valid_by_org_id($member->organization->id);

			return $this->load->view('issuebook_form',array('org_books'=>$org_books));
		}

		$data=array(
			'member'=>Member::find_by_id($this->session->userdata('member_id')),
			'org_book'=>Organization_book::find_by_id($this->input->post('org_book'))
			);
		
		try{
			$member_book=Member_book::create($data);

			if($member_book){
				return $this->load->view('success');	
			}
		}
		catch(BookNotAvailableException $e){
			$data['message'] = $e->getMessage();

			$member_id=$this->session->userdata('member_id');

			$member=Member::find_by_id($member_id);
			$data['org_books']=Organization_book::find('all',array('conditions'=>array('org_id'=>$member->organization->id)));

			return $this->load->view('issuebook_form',$data);
		}
		catch(QuantityBlankException $e){
			$data['message'] = $e->getMessage();

			$member_id=$this->session->userdata('member_id');

			$member=Member::find_by_id($member_id);
			$data['org_books']=Organization_book::find('all',array('conditions'=>array('org_id'=>$member->organization->id)));

			return $this->load->view('issuebook_form',$data);
		}
		catch(InvalidQuantityException $e){
			$data['message'] = $e->getMessage();

			$member_id=$this->session->userdata('member_id');

			$member=Member::find_by_id($member_id);
			$data['org_books']=Organization_book::find('all',array('conditions'=>array('org_id'=>$member->organization->id)));

			return $this->load->view('issuebook_form',$data);
		}	
		catch(AlreadyIssuedException $e){
			$data['message'] = $e->getMessage();

			$member_id=$this->session->userdata('member_id');

			$member=Member::find_by_id($member_id);
			$data['org_books']=Organization_book::find('all',array('conditions'=>array('org_id'=>$member->organization->id)));

			return $this->load->view('issuebook_form',$data);
		}
		catch(FullIssueBookException $e){
			$data['message'] = $e->getMessage();

			$member_id=$this->session->userdata('member_id');

			$member=Member::find_by_id($member_id);
			$data['org_books']=Organization_book::find('all',array('conditions'=>array('org_id'=>$member->organization->id)));

			return $this->load->view('issuebook_form',$data);
		}
		catch(InactiveExcepiton $e){
			$data['message'] = $e->getMessage();

			$member_id=$this->session->userdata('member_id');

			$member=Member::find_by_id($member_id);
			$data['org_books']=Organization_book::find('all',array('conditions'=>array('org_id'=>$member->organization->id)));

			return $this->load->view('issuebook_form',$data);
		}
		catch(DeletedException  $e){
			$data['message'] = $e->getMessage();

			$member_id=$this->session->userdata('member_id');

			$member=Member::find_by_id($member_id);
			$data['org_books']=Organization_book::find('all',array('conditions'=>array('org_id'=>$member->organization->id)));

			return $this->load->view('issuebook_form',$data);
		}
	}

	public function view_booklist(){	
		$member_books=Member_book::find('all',array('conditions'=>array('member_id=? and is_deleted!=1',$this->session->userdata('member_id'))));		

		return $this->load->view('member_booklist',array('member_books'=>$member_books));
	}

	public function revoke_book($id){
		$member_book=Member_book::find_by_id($id);

		try{
			$member_book->revoke();
		}
		catch(InvalidBookCountException $e){
			$message=$e->getMessage();

			$member_books=Member_book::find('all',array('conditions'=>array('member_id=? and is_deleted!=1',$this->session->userdata('member_id'))));		

			return $this->load->view('member_booklist',array('member_books'=>$member_books,'message'=>$message));
		}
		

		redirect('dashboard/view_booklist');
	}

	public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}