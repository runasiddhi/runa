<?php
class members extends CI_Controller{

	public function index(){

		if(!$_POST){
            $organizations = Organization::find('all', array('select' => 'id, name')); 
        
            return $this->load->view('member_list',array('organization'=>$organizations));
        }
	}

    public function view_all(){

        $org_id=$_POST['organization'];

        $members=Member::find_all_by_org_id($org_id);

        $organizations = Organization::find('all', array('select' => 'id, name')); 

        return $this->load->view('member_list',array('members'=>$members,'organization'=>$organizations));
    }

    public function view_undeleted(){

    	$org_id=$_POST['organization'];

    	$members=Member::find_all_undeleted_by_org_id($org_id);

    	$organizations = Organization::find('all', array('select' => 'id, name')); 

    	return $this->load->view('member_list',array('members'=>$members,'organization'=>$organizations));
    }

    public function view_valid(){

        $org_id=$_POST['organization'];

        $members=Member::find_all_valid_by_org_id($org_id);

        $organizations = Organization::find('all', array('select' => 'id, name')); 

        return $this->load->view('member_list',array('members'=>$members,'organization'=>$organizations));
    }

    public function view_info($member_id){

        try{

            $member=Member::find_undeleted_by_id($member_id);
        }
        catch(DeletedException $e){
            $message=$e->getMessage();

            $organizations = Organization::find('all', array('select' => 'id, name')); 
        
            return $this->load->view('member_list',array('organization'=>$organizations,'message'=>$message));
        }

        if($member){
            return $this->load->view('member_info',array('member'=>$member));
        }       

    }

}
?>
