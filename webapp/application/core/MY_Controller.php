<?php

class SessionController extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$member_id=null;
		$member=null;

		$member_id = $this->session->userdata('member_id');

		if(!$member_id)
		{
			$this->session->set_flashdata('error', 'You are not logged in. Please login to continue.');
			redirect('login');
		}
		$member = Member::find_by_id($member_id);

		if(!$member)
		{
			$this->session->set_flashdata('error', 'You are not logged in. Please login to continue.');
			redirect('login');
		}
	}
}

class NonSessionController extends CI_Controller {
	public function _construct(){
		parent::_construct();

	}

	public function check_session(){
		if($this->session->userdata('member_id')){
			redirect('dashboard');
		}
	}

}