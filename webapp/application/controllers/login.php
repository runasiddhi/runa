<?php
class Login extends NonSessionController{

	public function index(){ 
        $this->check_session();

        if(!$_POST){
            return $this->load->view('login');
        }

        $username=$this->input->post('user_name');
        $password=$this->input->post('pass_word');

        try
        {
            $user = User::check_login($username,$password); 

        }
        catch(UserInvalidException $e)
        {
            $message['message'] = $e->getMessage();
            return $this->load->view('login',$message);
        }
        catch(UserPasswordInvalidException $e)
        {
            $message['message'] = $e->getMessage();
            return $this->load->view('login',$message);
        }
        catch(InactiveException $e){
            $message['message'] = $e->getMessage();
            return $this->load->view('login',$message);
        }
        catch(DeletedException $e){
            $message['message'] = $e->getMessage();
            return $this->load->view('login',$message);
        }
        
        $this->session->set_userdata(array('member_id'=>$user->member->id));                    
        redirect('dashboard/index'); 
	}
}